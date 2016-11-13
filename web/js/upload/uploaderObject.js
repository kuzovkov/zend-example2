/*
 * Объект-загрузчик файла на сервер.
 * Передаваемые параметры:
 * file       - объект File (обязателен)
 * url        - строка, указывает куда загружать (обязателен)
 * fieldName  - имя поля, содержащего файл (как если задать атрибут name тегу input)
 * onprogress - функция обратного вызова, вызывается при обновлении данных
 *              о процессе загрузки, принимает один параметр: состояние загрузки (в процентах)
 * oncopmlete - функция обратного вызова, вызывается при завершении загрузки, принимает два параметра:
 *              uploaded - содержит true, в случае успеха и false, если возникли какие-либо ошибки;
 *              data - в случае успеха в него передается ответ сервера
 *              
 *              если в процессе загрузки возникли ошибки, то в свойство lastError объекта помещается
 *              объект ошибки, содержащий два поля: code и text
 */


function base64_encode( data ) {    // Encodes data with MIME base64
	    // 
	    // +   original by: Tyler Akins (http://rumkin.com)
	    // +   improved by: Bayron Guevara
	 
	    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
	    var o1, o2, o3, h1, h2, h3, h4, bits, i=0, enc='';
	 
	    do { // pack three octets into four hexets
	        o1 = data.charCodeAt(i++);
			o2 = data.charCodeAt(i++);
	        o3 = data.charCodeAt(i++);
	 
	        bits = o1<<16 | o2<<8 | o3;
	 
	        h1 = bits>>18 & 0x3f;
	        h2 = bits>>12 & 0x3f;
	        h3 = bits>>6 & 0x3f;
	        h4 = bits & 0x3f;
	 
	        // use hexets to index into b64, and append result to encoded string
	        enc += b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
	    } while (i < data.length);
	 
	    switch( data.length % 3 ){
	        case 1:
	            enc = enc.slice(0, -2) + '==';
	        break;
	        case 2:
	            enc = enc.slice(0, -1) + '=';
	        break;
	    }
	 
	    return enc;
	}

var uploaderObject = function(params) {

    if(!params.file || !params.url) {
        return false;
    }

    this.xhr = new XMLHttpRequest();
    this.reader = new FileReader();

    this.progress = 0;
    this.uploaded = false;
    this.successful = false;
    this.lastError = false;
    
    var self = this;    

    self.reader.onload = function() {
        self.xhr.upload.addEventListener("progress", function(e) {
            if (e.lengthComputable) {
                self.progress = (e.loaded * 100) / e.total;
                if(params.onprogress instanceof Function) {
                    params.onprogress.call(self, Math.round(self.progress));
                }
            }
        }, false);

        self.xhr.upload.addEventListener("load", function(){
            self.progress = 100;
            self.uploaded = true;
        }, false);

        self.xhr.upload.addEventListener("error", function(){            
            self.lastError = {
                code: 1,
                text: 'Error uploading on server'
            };
        }, false);

        self.xhr.onreadystatechange = function () {
            var callbackDefined = params.oncomplete instanceof Function;
            if (this.readyState == 4) {
                if(this.status == 200) {
                    if(!self.uploaded) {
                        if(callbackDefined) {
                            params.oncomplete.call(self, false);
                        }
                    } else {
                        self.successful = true;
                        if(callbackDefined) {
                            params.oncomplete.call(self, true, this.responseText);
                        }
                    }
                } else {
                    self.lastError = {
                        code: this.status,
                        text: 'HTTP response code is not OK ('+this.status+')'
                    };
                    if(callbackDefined) {
                        params.oncomplete.call(self, false);
                    }
                }
            }
        };

        self.xhr.open("POST", params.url);

        var boundary = "xxxxxxxxx";
        var type = (params.file.type)? params.file.type : 'application/octet-stream';
        self.xhr.setRequestHeader("Content-Type", "multipart/form-data, boundary="+boundary);
        self.xhr.setRequestHeader("Cache-Control", "no-cache");

        var body = "--" + boundary + "\r\n";
        body += "Content-Disposition: form-data; name='"+(params.fieldName || 'file')+"'; filename='" + params.file.name + "'\r\n";
        body += "Content-Type: "+type+"\r\n\r\n";
        body += base64_encode(self.reader.result) + "\r\n";
        if (params.makethumb){
            body += ("--" + boundary + "\r\n");
            body += 'Content-Disposition: form-data; name="makethumb"' + "\r\n\r\n";
            body += params.makethumb + "\r\n";
            body += ("--" + boundary + "\r\n");
            body += 'Content-Disposition: form-data; name="percent"' + "\r\n\r\n";
            body += params.percent + "\r\n";
        }
        
        body += "--" + boundary + "--";
        
        if(self.xhr.sendAsBinary) {
            // firefox
            self.xhr.sendAsBinary(body);
        } else {
            // chrome (W3C spec.)
            self.xhr.send(body);
        }

    };

    self.reader.readAsBinaryString(params.file);
};