{% extends 'admin/layout.html' %}
{% block content %}
<style>
.novalid
{
   border: 1px solid red;
}
.novalid-message
{
   color: red;
}
</style>

<h4><a href="/admin">Home</a> -> <a href="/admin/showlist/{{data.model.entity}}">{{data.model.entity}}</a> -> {{data.model.entity}}</h4>
<h3>{{data.model.name}}</h3>
<form onsubmit="return validate();" method="POST" action="/admin/{{data.action}}/{{data.model.entity}}/{% if data.object is defined %}{{data.object.getId}}{% endif %}" enctype="application/x-www-form-urlencoded">
<table class="table">
{% for col in data.model.schema_edit|keys %}
{% if data.model.schema_edit[col]['visible'] %}
<tr>
	<td>{{data.model.schema_edit[col]['name']}}</td>
    <td>
        {% set method='get'~(col|capitalize) %}
        {% if data.object is defined %}
            {% if data.model.schema_edit[col]['type'] == 'text' %}
                {% set value=attribute(data.object, method) %}
            {% elseif data.model.schema_edit[col]['type'] == 'datetime' %}
                {% set value=attribute(data.object, method) | date ('Y/m/d H:i:s') %}
            {% elseif data.model.schema_edit[col]['type'] == 'date' %}
                {% set value=attribute(data.object, method) | date ('Y/m/d') %}
            {% elseif data.model.schema_edit[col]['type'] == 'array' %}
                {% set value=attribute(data.object, method)|join(',') %}
            {% elseif data.model.schema_edit[col]['type'] == 'img' %}
                {% set value=attribute(data.object, method) %}
            {% elseif data.model.schema_edit[col]['type'] == 'integer' %}
                {% set value=attribute(data.object, method) %}
            {% elseif data.model.schema_edit[col]['type'] == 'object_array' %}
                {% set value=attribute(data.object, method) %}
            {% elseif data.model.schema_list[col]['type'] == 'string' %}
                {% set value=attribute(data.object, method) %}
            {% endif%}

            {% if data.model.schema_edit[col]['type'] == 'checkbox' %}
                {% if attribute(data.object, method) %}
                    {% set checked='checked' %}
                {% else %}
                    {% set checked='' %}
                {% endif %}
            {% endif %}
        {% else %}
            {% if data.model.schema_edit[col]['default'] is defined %}
                {% set value = data.model.schema_edit[col]['default'] %}
            {% endif %}

        {% endif %}
        {% set disabled='' %}
        {% if data.model.schema_edit[col]['enabled'] is defined %}{% if not data.model.schema_edit[col]['enabled'] %}{% set disabled='disabled' %}{% endif %}{% endif %}
        {% set required='' %}
        {% if data.model.schema_edit[col]['required'] is defined %}{% if data.model.schema_edit[col]['required'] %}{% set required='required' %}{% endif %}{% endif %}


        {% if data.model.schema_edit[col]['type'] == 'select' %}
            <p>
                <select name="{{col}}">
                    {% for opt in data.model.schema_edit[col]['options'] %}
                        <option value="{{opt}}" {% if opt in attribute(data.object, method) %} selected {% endif %}>{{opt}}</option>
                    {% endfor %}
                </select>
            </p>
        {% elseif data.model.schema_edit[col]['type'] == 'multiselect' %}
            <p>
                <select multiple name="{{col}}[]">
                    {% for opt in data.model.schema_edit[col]['options'] %}
                        <option value="{{opt}}" {% if opt in attribute(data.object, method) %} selected {% endif %}>{{opt}}</option>
                    {% endfor %}
                </select>
            </p>
        {% elseif data.model.schema_edit[col]['type'] == 'text' %}
            <textarea name="{{col}}" type="{{data.model.schema_edit[col]['type']}}" {% if data.model.schema_edit[col]['class'] is defined %} class="{{data.model.schema_edit[col]['class']}}" {% endif %}>{{value}}</textarea>


        {% elseif data.model.schema_edit[col]['type'] == 'img' %}


            <img id="img-preview" width="100" height="75"  src="{% if value == '' %}/upload/default.png{% else %}{{'/'~data.upload_dir~'/'~value}}{% endif %}" {% if data.model.schema_edit[col]['class'] is defined %} class="{{data.model.schema_edit[col]['class']}}" {% endif %}/>
            <input type="hidden" name="{{col}}" value="{{value}}" id="img-value"/>
            <a href="#" id="open-images">Изображения</a>

        {% elseif data.model.schema_edit[col]['type'] == 'object_array' %}
            {% if data.action == 'edit' %}
                {% include 'admin/crud/object_array_edit.html' %}
            {% else %}
                {% include 'admin/crud/object_array_create.html' %}
            {% endif %}
        {% else %}
            <p><input name="{{col}}" type="{{data.model.schema_edit[col]['type']}}" value="{{value}}" {{checked}} {{disabled}} {{required}} {% if data.model.schema_edit[col]['class'] is defined %} class="{{data.model.schema_edit[col]['class']}}" {% endif %} {% if data.model.schema_edit[col]['placeholder'] is defined %} placeholder="{{data.model.schema_edit[col]['placeholder']}}" {% endif %}/></p>
        {% endif %}
    </td>
</tr>
{% endif %}
{% endfor %}

</table>
<button>{% if data.action=='edit' %} Save {% else%} Create {% endif %}</button>

</form>

{% include 'admin/crud/tinymce.html' %}
{% include 'admin/crud/select_image.html' %}
{% endblock %}

{% block bottom_js%}
   <script type="text/javascript">
        App.switchMenu('home');
   </script>
   <script type="text/javascript" src="/js/validate.js"></script>
    <script type="text/javascript">
        $(function() {
            $( "input.datetime" ).datepicker();
        });
    </script>

    <script>
    </script>

{% endblock %}