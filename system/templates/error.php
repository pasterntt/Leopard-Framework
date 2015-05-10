<html>
<head>
<style>
@import url('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
 
*{
    font-family: Arial;
}
.error {
margin: 5px 0px;
padding:5px;
}
.error {
    color: #fff;
    background-color: #DD5A34;
}
.error i {
    margin:10px 22px;
    font-size: 15px;
    vertical-align:middle;
}
.notification{
    margin-top: 20px;
    margin-left: 15px;
    margin-right: 15px;
    min-width: 720px;
    background-color: #F1F1F1;
}
.notification .content{
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
}
.notification .heading{
    background-color: #DBDBDB;
    font-weight: bold;
    color: #3C3C3C;
    padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 20px;
    padding-right: 20px;
}
</style>
</head>

<body>
	
</body>
<div class="notification">
    <p class="heading">Framework</p>
    <div class="content">
        <p class="error">
	       <i class="fa fa-times-circle"></i>
	        <?php echo $msg; ?>
        </p>
    </div>
</div>
</html>