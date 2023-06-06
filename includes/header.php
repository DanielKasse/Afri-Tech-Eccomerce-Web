<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Afri-Tech Eccomerce Website</title>
  	<!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Magnify -->
    <link rel="stylesheet" href="magnify/magnify.min.css">

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Paypal Express -->
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!-- Google Recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

  	<!-- Custom CSS -->
    <style type="text/css">
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px){ 
      #navbar-search-input{ 
        width: 60px; 
      }
      #navbar-search-input:focus{ 
        width: 100px; 
      }
    }

    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px){ 
      #navbar-search-input{ 
        width: 150px; 
      }
      #navbar-search-input:focus{ 
        width: 250px; 
      } 
    }

    .word-wrap{
      overflow-wrap: break-word;
    }
    .prod-body{
      height:300px;
    }

    .box:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    .register-box{
      margin-top:20px;
    }

    #trending{
      list-style: none;
      padding:10px 5px 10px 15px;
    }
    #trending li {
      padding-left: 1.3em;
    }
    #trending li:before {
      content: "\f046";
      font-family: FontAwesome;
      display: inline-block;
      margin-left: -1.3em; 
      width: 1.3em;
    }

    /*Magnify*/
    .magnify > .magnify-lens {
      width: 100px;
      height: 100px;
    }


    .pro-grand {
  display: grid;
  place-content: center;
  background: #d2d6de;
}

.pro-container{
  width: 80vw;
  height:80vh;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
}
.pro-header{
  width: 100%;
  text-align: center;
}
.pro-header h1{
  font-size: 4em;
  text-transform: uppercase;
  color: var(--textColor);
}
.pro-products{
  width: 100%;
  align-self: center;
  height: 70%;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 40px;
}
.pro-product{
  position: relative;
  background-color: var(--sectionBack);
  width: 350px;
  height: 100%;
  box-shadow: 0 5px 20px rgba(0, 0, 0, .3);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 20px 20px 40px;
  border-radius: 10px;
  transition: .3s;
}
.pro-product:hover{
  transform: translateY(-15px);
  box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
}
.pro-image{
  width:100%;
  height: 60%;
  display: grid;
  place-content: center;
  padding: 1rem;
}
.pro-image img{
  width: 240px;
}
.pro-namePrice{
  width: 100%;
  display: flex;
  justify-content: space-between;
}
.pro-namePrice h3{
  font-size: 2em;
  text-transform: capitalize;
  color: var(--textColor);
}
.pro-namePrice span{
  font-size: 1.5em;
  color: var(--starColor);
}
.pro-product p{
  font-size: 18px;
  line-height: 25px;
}
.pro-stars svg{
  font-size: 1.3em;
  color: var(--starColor);
}
.pro-bay{
  position: absolute;
  bottom: 20px;
  right: 20px;
}
.pro-bay button{
  padding: 10px 20px;
  border-radius: 7px;
  border: none;
  background-color: var(--textColor);
  color: var(--sectionBack);
  font-size: 18px;
  text-transform: capitalize;
  cursor: pointer;
  transition: .5s;
}
.pro-bay button:hover{
  transform: scale(1.1);
}

    </style>

</head>