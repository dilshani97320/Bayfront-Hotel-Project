<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    background: #f2f2f2;
}
.wrapper{
    background-color: rgb(190, 187, 187);
    width: 700px;
    height: 650px;
    padding: 25px;
    margin: 50px auto 0;
    border-top: 25px solid rgba(76, 25, 88, 0.667);
    box-shadow: 0 0 3px rgba(0,0, 0,1);
}
.wrapper h2{
    font-size: 24px;
    line-height: 24px;
    padding-bottom: 30px;
    text-align: center;
}
.input-name{
    width: 90%;
    position: relative;
    margin: 20px auto;
    margin-block: 20px;
   
}

.text-name{
    width: 45%;
    padding :8px 0 8px 40px;
    border-radius: 5px;
    
}

.text-name{
    border: 1px solid rgb(197, 160, 197);
    outline: none;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition:all 0.30s ease-in-out ;
    -ms-transition:all 0.30s ease-in-out;
    transition: all 0.30s ease-in-out;
}
.text-name:hover {
    background-color:rgb(230, 204, 230);
}
.country{
    display: inline-block;
    width: 45%;
    height: 35px;
    padding: 0px 15px;
    cursor: pointer;
   color: rgb(126, 121, 121);
    border: 1px solid rgb(197, 160, 197);
    border-radius: 5px;
    background: #fff;

}
.button{
    background-color: rgb(66, 42, 66);
    padding: 5px 50px;
    line-height: 35px;
    display:flex; 
    color: #f2f2f2;
    border-radius: 5px;
    outline: none;
    font-size: 17px;
}
.input-name .button{
    float: right;
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    background: #f2f2f2;
}
.wrapper{
    background-color:#fff;
    width: 900px;
    height: 500px;
    padding: 25x;
    margin: 50px auto 0;
    border-top: 25px solid rgba(76, 25, 88, 0.667);
    box-shadow: 0 0 3px rgba(0,0, 0,1);
}
.wrapper h2{
    font-size: 24px;
    line-height: 24px;
    padding-bottom: 30px;
    text-align: center;
}
.main-container{
    display: inline-block;
    width: 100%;
    
}
.form-container{
    width: 50%;
    display:block;
    position: relative;
}
.logo{
    width: 50%;
    float: right;
}
.logo .cards img{
    width: 400px;
    height: 50px;
}
.input-name{
    width: 90%;
    position: relative;
    margin: 20px auto;
    margin-block: 25px;
   
}

.row-main{
    width: 50%;
    position: relative;
    margin: 20px ;

    
}

.row{
 width: 45%;   
display: inline-block;
margin-block-end: 20px;



}

.row input{
    width: 100%;
    padding :4px 0 4px 20px;
    border-radius: 5px;
    border: 1px solid rgb(197, 160, 197);
    outline: none;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition:all 0.30s ease-in-out ;
    -ms-transition:all 0.30s ease-in-out;
    transition: all 0.30s ease-in-out;
   
}
.row input:hover{
    background-color:rgb(230, 204, 230);
}

.text-name{
    width: 50%;
    padding :8px 0 8px 40px;
    border-radius: 5px;
    border: 1px solid rgb(197, 160, 197);
    outline: none;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition:all 0.30s ease-in-out ;
    -ms-transition:all 0.30s ease-in-out;
    transition: all 0.30s ease-in-out;
}
.text-name:hover {
    background-color:rgb(230, 204, 230);
}
.payment{
    display: inline-block;
    width: 50%;
    height: 35px;
    padding: 0px 15px;
    cursor: pointer;
   color: rgb(126, 121, 121);
    border: 1px solid rgb(197, 160, 197);
    border-radius: 5px;
    background: #fff;

}

.check{
    color: slategray;
}
</style>
<body>
 <div class="wrapper">
    <h2>Guest</h2>
    <div class="form-container">
        <form>
            <div class="input-name">
                <label>Full Name</label><br>
                <input type="text" name="fname" placeholder="First Name" class="text-name">
                <span>
                    <input type="text" name="lname" placeholder="Last Name" class="text-name">
                </span>
            </div>

            <div class="input-name">
                <label>Phone</label><br>
                <input type="text" name="phone" placeholder="+94........" class="text-name">

            </div>
            <div class="input-name"><br>
                <label>Country</label><br>
                <select class="country" class="text-name">
                  <option>Select a country</option>
                  <option>India</option>
                  <option>Pakistan</option>
                  <option>Australia</option>
               
                </select>  
            </div>
            <div class="input-name"><br>
                <label>Number of guests</label><br>
                <input type="text" name="adult" placeholder="Adult" class="text-name">
                <span>
                    <input type="text" name="child" placeholder="Child" class="text-name">
                </span>
            </div>
            <div class="input-name">
                <label>Arrival Date</label><br>
                <input type="date" name="date" class="text-name">
                
            </div>
            <div class="input-name">
                <label>Special Requirement</label><br>
                <input type="text" name="Requirement" placeholder="Enter.." class="text-name">
                
            </div>

            <div class="input-name">
                
                <input class="button" type="submit" value="Next">
                
            </div>
        </form>
    </div>


 </div>
 <div class="wrapper">
    <h2>CREDIT/DEBIT CARD</h2>
    <div class="main-container">
    <div class="logo">
       <div class="cards">
<img src="img1.png">
       </div>
       <div class="main-logo">
           <img src="img2.jpg" width="350" height="300">
       </div>
    </div>
    <div class="form-container">
        <form>
            

            <div class="input-name">
                <label>Select Payment Method</label><br>
                <select class="payment" class="text-name">
                    <option>Visa/Master Card/JCB</option>
                    <option>Visa</option>
                    <option>Master card</option>
                    <option>JCB</option>
                 
                  </select> 

            </div>
           
        
            <div class="input-name">
                <label>Card holder name</label><br>
                <input type="name" name="name" class="text-name">
                
            </div>
            <div class="input-name">
                <label>Credit/Debit card number</label><br>
                <input type="text" name="card-no" placeholder="xxxx xxxxx xxx xxx" class="text-name">
                
            </div>
            <div class="row-main">
                <div class="row">
                <label>Expiry date</label><br>
                <input type="date" name="date" placeholder="DD/MM/YY">
            </div>
                <div class="row">
                    <label>CVC/CVV</label>
                    <input type="text" name="cvc" >
               
            </div>
            </div>

            <div class="input-name">
                
               <input type="checkbox" class="check-btn" id="cb">
               <label for="cb" class="check">Save this card to my accountfor faster booking</label>
            </div>
        </form>
    </div>

</div>
 </div>
</body>
</html>