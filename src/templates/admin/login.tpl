{extends 'admin/login_layout.tpl'}
{block "content"}
<style>
.novalid
{
   border: 1px solid red;
}
.novalid-message
{
   color: red;
}
.form-group input
{
    width: 400px;
    margin: 0 auto 0 auto;
}
.login-form
{
    text-align: center;
}
</style>
{if $errmsg}
<p class="novalid-message">{$errmsg}</p>
{/if }

<form method="post" action="/login">
    <div class="login-form">
        <div class="form-group">
            <input type="login" class="form-control" name="login" placeholder="Имя">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Пароль">
        </div>
        <button type="submit" id="login-btn" class="btn btn-default">Войти</button>
    </div>
</form>


{/block}