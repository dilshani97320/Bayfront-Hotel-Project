@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap");

* {
  margin: 0;
  padding: 0;
}

body {
  font-family: "Roboto", "Helvetica", "Arial", sans-serif;
  line-height: 1.5em;
  font-weight: 300;
  color: #3c4858;
  background-color: #eee;
}

/* .wrapper {
    display: inline;
    width: 100%;
} */

.sidebar {
  display: inline-block;
  position: fixed;
  width: 260px;
  background-color: #ffffff;
  /* border-right: 2px solid #000000; */
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 2;
  box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56),
    0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}

.logo {
  display: inline-flex;
  width: 100%;
  /* margin-top: 10px; */
  /* justify-content: center; */
  padding: 15px 0;
  align-items: center;
  /* text-align: center; */
  justify-content: center;
  padding-bottom: 0;
}

img {
  src: url(../img/wolflogoBasic.png);
  /* display: flexbox; */
  width: 50px;
  margin-right: 10px;
}

p {
  text-transform: uppercase;
  font-weight: 300;
  font-size: 18px;
  line-height: 30px;
  white-space: nowrap;
  color: #3c4858;
}

p #text {
  display: block;
  height: 50px;
  width: 150px;
  margin: 0;
  text-align: center;
  justify-content: center;
}

hr {
  position: relative;
  bottom: 0;
  right: 15px;
  left: 15px;
  height: 1px;
  width: calc(100% - 30px);
  background-color: rgba(180, 180, 180, 0.3);
  box-sizing: border-box;
}

.container {
  width: 260px;
  padding-bottom: 30px;
  padding-top: 0;
  height: 100%;
  z-index: 4;
  margin-top: 15px;
}

.nav1 {
  padding: 0;
}
.nav1-item {
  width: 100%;
}

li {
  list-style: none;
}

a.nav1-link {
  display: block;
  margin: 10px 15px 0;
  border-radius: 3px;
  padding: 10px 15px;
  /* margin-top: 0px; */
  text-decoration: none;
}

.nav1-link:hover {
  background-color: #85b5cc;
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14),
    0 7px 10px -5px rgba(156, 39, 176, 0.4);
  color: #ffffff;
}

/* .nav1-link:visited {
    background-color: #9c27b0;
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
    color: #ffffff;
} */

.nav-p {
  display: block;
  margin: 0;
  font-size: 16px;
  line-height: 30px;
  font-weight: 100;
  height: auto;
  justify-content: center;
  text-transform: capitalize;
  color: #3c4858;
}

a:hover > p {
  color: #ffffff;
}

i.material-icons {
  font-size: 24px;
  float: left;
  margin-right: 15px;
  width: 30px;
  line-height: 30px;
  text-align: center;
  color: #a9afbb;
}

a:hover > p > i {
  color: #ffffff;
}

.nav {
  float: right;
  width: 80%;
  height: 150px;
}

/* Navbar style */

.navbar {
  float: right;
  display: flex;
  width: 80%;
  height: 80px;
  margin-top: 18px;
  position: relative;
}

.nav-header {
  display: block;
  width: 20%;
  margin-left: 15px;
  height: 50px;
  margin-right: 15px;
  text-align: left;
  justify-content: center;
  padding-top: 10px;
  font-weight: 300;
  color: #3c4858;
  line-height: 30px;
}

.form {
  width: 75%;
  /* display: inline block; */
  display: inline-block;
  height: 50px;
  padding-top: 10px;
  /* margin-left: 560px; */
}

.nav-form {
  display: block;
  float: right;
}

.navbar-input {
  float: left;
  margin: 0;
  display: block;
  height: 50px;
  margin-left: 10px;
}

.navbar-button {
  float: left;
  margin: 0;
  display: flex;
  height: 42px;
  margin-left: 10px;
  border-radius: 4px;
}

.naverror-pass,
.naverror-mail,
.nav-mail,
.nav-pass {
  width: 200px;
  border-radius: 4px;
  font-size: 14px;

  display: block;
  margin-left: 0;
  border: none;
  /* width: 60%; */
  /* font-size: .9rem;
    font-weight: 300;
    line-height: 1.4em; */
  border-bottom: 2px solid rgba(0, 0, 0, 0.06);
  height: 40px;
  padding-left: 30px;
  line-height: 1.4em;
  font-weight: 100;
  
}

/* .nav-mail,
.nav-pass {
  border-radius: 4px;
  font-size: 14px;
} */

.nav-button {
  outline: none;
  border: none;
  background: linear-gradient(60deg, #0b2e4f, #0b2e4f);
  border-radius: 4px;
  width: 100px;
  font-size: 14px;
  text-transform: uppercase;
  cursor: pointer;
  color: #fff;
}

input.nav-search::placeholder {
  text-transform: capitalize;
  font-style: normal;
  font-size: 14px;
}
input[type="email"].nav-mail::placeholder {
  text-transform: capitalize;
  font-style: normal;
  font-size: 14px;
}

input[type="email"].naverror-mail::placeholder {
  text-transform: capitalize;
  font-style: normal;
  font-size: 14px;
  color: rgb(170, 8, 43);
}

input[type="password"].nav-pass::placeholder {
  text-transform: capitalize;
  font-style: normal;
  font-size: 14px;
}

input[type="password"].naverror-pass::placeholder {
  text-transform: capitalize;
  font-style: normal;
  font-size: 14px;
  color: rgb(170, 8, 43);
}
.naverror-pass:focus,
.naverror-mail:focus,
.nav-mail:focus,
.nav-pass:focus,
.nav-search:focus {
  margin-left: 0;
  border-bottom: none;
  background-image: none;
  font-size: 14px;
}

.navform {
  float: left;
  width: 80%;
  display: flex;
  /* height: 50px; */
}

.form-search {
  width: 58%;
  margin-top: 10px;
}

.nav-form1 {
  display: flex;
  width: 100%;
  background: #fff;
  border-radius: 5px;
  /* background-color: #ddd; */
}

.form1 {
  display: inline-block;
  /* padding-left: 30%; */
  margin-left: 30px;
  padding-top: 10px;
  height: 50px;
  width: 35%;
}

.form2 {
  display: flex;
  float: right;
}

.label-login {
  /* display: inline-flex; */
  display: block;
  height: 50px;
  /* width: 150px; */
  margin-left: 0;
  margin-right: 0;
}

.nav-search {
  margin-right: 0;
  width: 90%;
  margin-bottom: 0;
  border-bottom: 0;
  border-radius: 5px;

  display: block;
  margin-left: 0;
  border: none;
  height: 40px;
  padding-left: 30px;
  /* font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 100; */
}

input[type="search"]::-webkit-search-decoration,
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-results-button,
input[type="search"]::-webkit-search-results-decoration {
  display: none;
}

.material-icons.md-16 {
  font-size: 30px;
  width: 40px;
  height: 35px;
  margin-right: 0;
  background: #fff;
  /* margin-top: 5px; */
  padding-top: 5px;
}

.material-icons.md-18 {
  font-size: 35px;
}

.label-welcome {
  margin-left: 0;
  margin-top: 5px;
  width: 150px;
}

/* Main Content Style */

.content {
  /* top: 0px; */
  float: right;
  width: 80%;
  display: block;
}

.tablecard {
  display: flex;
}

.card {
  display: block;
  margin-bottom: 30px;
  margin-top: 30px;
  margin-right: 10px;
  margin-left: 15px;
  border: 0;
  border-radius: 6px;
  color: #333333;
  background: #fff;
  width: 100%;
  box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
  font-size: 0.875rem;
}

.cardheader {
  padding: 15px;
  background: linear-gradient(60deg, #0b2e4f, #0b2e4f);
  /* background-image: url(../img/footer.jpg); */
  margin-top: -20px;
  margin-left: 15px;
  margin-right: 15px;
  margin-bottom: 0;
  border-radius: 3px;
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14),
    0 7px 10px -5px rgba(156, 39, 176, 0.4);
  z-index: 3;
  color: #fff;
}

h4 {
  display: flex;
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 300;
}

.addnew {
  display: flex;
  margin-left: 30px;
  margin-right: 10px;
  text-decoration: none;
  text-transform: uppercase;
  color: #a9afbb;
}

.addnew > .material-icons {
  color: #a9afbb;
}

.addnew:hover {
  color: #fff;
}

.addnew:hover > .material-icons {
  color: #fff;
}

/* .addnew>.material-icons {
    margin-bottom: 5px;
} */

.refresh {
  display: flex;
  text-transform: uppercase;
  margin-left: 10px;
  margin-right: 10px;
  text-decoration: none;
  color: #a9afbb;
}

.refresh:hover {
  color: #ffffff;
}

.refresh:hover > .material-icons {
  color: #fff;
}

.refresh > .material-icons {
  color: #a9afbb;
}

span {
  display: flex;
}

span > a > .material-icons {
  margin-right: 0;
}

.textfortabel {
  display: block;
  font-size: 0.875rem;
  font-weight: 300;
  color: rgba(255, 255, 255, 0.8);
  text-transform: capitalize;
}

.cardbody {
  padding: 15px 25px;
}

table {
  width: 100%;
  margin-bottom: 16px;
  background-color: transparent;
  border-collapse: collapse;
}

thead {
  color: #030c14;
  display: flexbox;
}

th {
  text-align: inherit;
  font-size: 17px;
  font-weight: 300;
  padding: 12px 8px;
  vertical-align: middle;
  box-sizing: border-box;
  border-bottom: 2px solid rgba(0, 0, 0, 0.06);
  /* width: 15%; */
}

th a {
  text-decoration: none;
}
td {
  padding: 12px 8px;
  vertical-align: middle;

  border-top: 1px solid rgba(0, 0, 0, 0.06);
  border-bottom: 2px solid rgba(0, 0, 0, 0.06);
}

.in {
  color: #fff;
  font-weight: 300;
  background-color: rgb(22, 80, 22);
  width: 80px;
  text-align: center;
  border-radius: 3px;
}

.out {
  color: #fff;
  font-weight: 300;
  background-color:  rgb(116, 24, 24);
  width: 80px;
  text-align: center;
  border-radius: 3px;
}

.table > thead > tr > th {
  border-color: #ddd;
}

td a {
  text-decoration: none;
  text-align: center;
}

.edit {
  /* display: flex; */
  text-transform: uppercase;
  text-align: center;
  color: green;

  /* border: 1px solid #000000 ; */
}

.edit:hover {
  color: green;
}

.edit:hover > .material-icons {
  color: green;
}

.delete {
  text-transform: uppercase;
  color: #333333;
}

.delete:hover {
  color: #f62d51;
}

.delete:hover > .material-icons {
  color: red;
}

.edit > .material-icons {
  color: #ddd;
}

.delete > .material-icons {
  color: #ddd;
}

/* Addnew Style */
.addnewform {
  margin: 20px;
  display: flex;
}

.section1 {
  width: 100%;
  display: inline;
  /* display: flex; */
}

.section2 {
  width: 20%;
  display: inline;
  /* display: flex; */
}
.errmsg {
  color: #fff;
  /* background-color: rgb(240, 39, 39); */
  background-color: #e06c78;
  border-radius: 3px;
  width: 90%;
  padding: 5px;
  justify-content: center;
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 100;
  margin-bottom: 20px;
}

.errphoto > img {
  /* background-image: url('img/employee.jpg'); */
  width: 100%;
  height: 450px;
}

.errphoto > h4 {
  /* background-image: url('img/employee.jpg'); */
  color: #395e95;
  text-align: center;
  justify-content: center;
}

#text {
  font-size: 0.875rem;
  font-weight: 300;
}

.row {
  display: inline-flex;
  width: 100%;
  margin: 10px;
}

label {
  font-size: 16px;
  line-height: 1.4em;
  font-weight: 300;
  margin: 10px;
  margin-left: 0;
  display: block;
  margin-right: 0;

}

.inputField {

  width: 40%;;
  display: block;
  margin-left: 0;
  border: none;
  width: 60%;
  font-size: .9rem;
    font-weight: 300;
    line-height: 1.4em;
  border-bottom: 2px solid rgba(0, 0, 0, 0.06);
  height: 40px;
  padding-left: 30px;
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 100;
}

::placeholder {
    color: #000;
    margin-left: 20px;
}

input[type="text"]::placeholder,
.change {
  /* padding-left: 10px;  */
  color: #aaaaaa;
  border: none;
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 100;
  font-style: italic;
}

input[type="textarea"]::placeholder,
.change {
  /* padding-left: 10px;  */
  color: #aaaaaa;
  border: none;
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 100;
  font-style: italic;
}
input[type="email"]::placeholder {
  /* padding-left: 10px;  */
  color: #aaaaaa;
  border: none;
  font-size: 1.125rem;
  line-height: 1.1em;
  font-weight: 100;
  font-style: italic;
}

input[type="password"]::placeholder {
  /* padding-left: 10px;  */
  color: #aaaaaa;
  border: none;
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 100;
  font-style: italic;
}

/* linear-gradient(60deg, #0b2e4f, #0b2e4f) */

input:focus {
  outline: none;
  /* margin-left: 20px; */
  background-image: linear-gradient(
      to top,
      #0b2e4f 2px,
      rgba(156, 39, 176, 0) 2px
    ),
    linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
}

input#text {
  margin-left: 20px;
}

.button {
  display: block;
  margin-top: 20px;
}

.save {
  display: block;
  padding: 12px 30px;
  margin: 5px 1px;
  font-size: 13px;
  font-weight: 400;
  line-height: 1.428571;
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 0;
  color: #fff;
  /* background-color: #9c27b0; */
  background: linear-gradient(60deg, #0b2e4f, #0b2e4f);
  border-color: #0b2e4f;
  border-radius: 4px;
  width: 150px;
  height: 50px;
  border: 0;
  box-shadow: 0 2px 2px 0 rgba(156, 39, 176, 0.14),
    0 3px 1px -2px rgba(156, 39, 176, 0.2), 0 1px 5px 0 rgba(156, 39, 176, 0.12);
  cursor: pointer;
}

/* modifyemployee file style */

.change_password {
  display: block;
  padding: 12px 30px;
  margin: 5px 1px;
  margin-left: 10px;
  margin-bottom: 0;
  margin-top: 0;
  font-size: 13px;
  font-weight: 400;
  line-height: 1.428571;
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 0;
  color: #fff;
  background-color: #9c27b0;
  border-color: #9c27b0;
  border-radius: 4px;
  width: 150px;
  height: auto;
  /* height: 50px; */
  border: 0;
  box-shadow: 0 2px 2px 0 rgba(156, 39, 176, 0.14),
    0 3px 1px -2px rgba(156, 39, 176, 0.2), 0 1px 5px 0 rgba(156, 39, 176, 0.12);
  cursor: pointer;
  text-align: center;
  justify-content: center;
}

.ch_password {
  display: inline-flex;
  padding-left: 30px;
}

/* change_password style */

.update_password {
  display: block;
  padding: 12px 30px;
  margin: 5px 1px;
  font-size: 13px;
  font-weight: 400;
  line-height: 1.428571;
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 0;
  color: #fff;
  background-color: #9c27b0;
  border-color: #9c27b0;
  border-radius: 4px;
  width: auto;
  height: 50px;
  border: 0;
  box-shadow: 0 2px 2px 0 rgba(156, 39, 176, 0.14),
    0 3px 1px -2px rgba(156, 39, 176, 0.2), 0 1px 5px 0 rgba(156, 39, 176, 0.12);
  cursor: pointer;
}

.visible {
  font-size: 1.25rem;
  line-height: 1.4em;
  font-weight: 300;
  /* margin: 10px; */
  margin-left: 0;
  display: block;
  margin-right: 0;
  width: 35%;
}

input[type="checkbox"] {
  display: block;
  text-align: center;
  width: 20px;
  height: 20px;
  padding-top: 10px;
  justify-content: center;
  margin-top: 5px;
  border: #000;
  margin-left: 0;
  padding-left: 0;
}

input[type="text"]:disabled {
  display: block;
  margin-left: 0;
  border: none;
  width: 60%;
  border-bottom: 2px solid rgba(0, 0, 0, 0.06);
  height: 40px;
  padding-left: 30px;
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 100;
  color: #000;
}

input[type="email"]:disabled {
  display: block;
  margin-left: 0;
  border: none;
  width: 60%;
  border-bottom: 2px solid rgba(0, 0, 0, 0.06);
  height: 40px;
  padding-left: 30px;
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 100;
  color: #000;
}

input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active  {
    box-shadow: 0 0 0 30px white inset !important;
}

input:-webkit-autofill {
  -webkit-text-fill-color: #000 !important;
}

select {
  outline: none;
}

.inputFieldSelect {
  -webkit-appearance: none;
  color: black;
  border: none;
  border-radius: 2px;
  /* color: white; */

  display: block;
  margin-left: 0;
  width: 60%;
  height: 40px;
  padding-left: 30px;
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 100;
}

select:after {
  content: " ";
  border: none;
  display: inline-block;
  width: 24px; height: 24px;
  /* background: blue; */
}



/* room-view style */


.row1 {
  display: inline-flex;
  width: 100%;
  height: auto;
  margin: 10px;
}

.more {
  font-size: 1.25rem;
  line-height: 1.4em;
  font-weight: 300;
  /* margin: 10px; */
  margin-left: 0;
  display: block;
  margin-right: 0;
  width: 31%;
}

input[type="textarea"] {
  display: block;
  margin-left: 0;
  border: none;
  width: 100%;
  /* font-size: .9rem;
    font-weight: 300;
    line-height: 1.4em; */
  border-bottom: 2px solid rgba(0, 0, 0, 0.06);
  height: 40px;
  padding-left: 30px;
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 100;
}

/* Animation input style here */

.animate-form {
  width: 100%;
  position: relative;
  /* height: 80px; */
  /* background: blue; */
  overflow: hidden;
  /* margin-bottom: 10px; */
}

.animate-form input {
  width: 100%;
  height: 100%;
  color: #595f6e;
  /* padding-top: 20px; */
  border: none;
  outline: none;
  /* border-bottom: 2px solid rgba(0, 0, 0, 0.06); */
}

.animate-form:input {
  border-bottom: 2px solid rgba(0, 0, 0, 0.06);
}

.animate-form label {
  position: absolute;
  bottom: 0px;
  left: 0%;
  width: 100%;
  height: 100%;
  pointer-events: none; /* This is important */
  border-bottom: 2px solid rgba(0, 0, 0, 0.06);
}

.animate-form label:after {
  content: "";
  position: absolute;
  left: 0px;
  bottom: -1px; /* This is important */
  height: 100%;
  width: 100%;
  /* border-bottom: 3px solid #0b2e4f; */
  transform: translateX(-100%);
  transition: transform all 0.3s ease;
}

.content-name {
  position: absolute;
  bottom: 5px;
  left: 0px;
  transition: all 0.3s ease;
  font-size: 16px;
}

.content-success {
  position: absolute;
  bottom: 5px;
  left: 0px;
  transition: all 0.3s ease;
  font-size: 16px;
}

/* Animation here */

.animate-form input:focus + .label-name .content-name,
.animate-form input:valid + .label-name .content-name {
  transform: translateX(360px);
  font-size: 16px;
  color: rgb(116, 24, 24);
}

.animate-form input + .label-name .content-success,
.animate-form input:focus + .label-name .content-success,
.animate-form input:valid + .label-name .content-success {
  transform: translateX(360px);
  font-size: 16px;
  color: rgb(22, 80, 22);
}



.animate-form input:focus + .label-name .content-name .material-icons,
.animate-form input:valid + .label-name .content-name .material-icons {
  color: rgb(116, 24, 24);
}

.animate-form input:focus + .label-name .content-success .material-icons,
.animate-form input:valid + .label-name .content-success .material-icons {
  color: rgb(22, 80, 22);
}

.animate-form input:focus + .label-name::after,
.animate-form input:valid + .label-name::after {
  transform: translateX();
  border-bottom: 2px solid rgba(0, 0, 0, 0.06)
}

/* Reservation style */

.customer-details {
  display: block;
  width: 50%;
  margin: 0;
}

.payment-details {
  display: block;
  width: 50%;
  margin: 0;
}

.details {
  display: flex;
}


/* Dashboard style */
.content1 {
  top: 0px;
  float: right;
  width: 80%;
  display: block;
  padding-right: 10px;
}

.container1 {
  display: flex;
  width: 100%;
  
}

.row1 {
  display: flex;
  width: 90%;
}

.data1 {
  display: block;
  flex: 0 0 25%;
  padding: 0px 15px;
}

.card1 {
  border: 0;
  margin-bottom: 30px;
  margin-top: 30px;
  border-radius: 6px;
  color: #333333;
  background: #fff;
  width: 100%;
  box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);

  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
}

.card-header1 {
  text-align: right;
  margin: 0px 15px 0;
  padding: 0;
}

.card-icon1, .card-icon2 , .card-icon3, .card-icon4 {
  border-radius: 3px;
  background-color: #999999;
  padding: 15px;
  margin-top: -20px;
  margin-right: 15px;
  float: left;
  
}

.card-icon1 {
  border-radius: 6px;
  background: linear-gradient(60deg, #0b2364, #050633);
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 47, 255, 0.4);
}

.card-icon2 {
  border-radius: 6px;
  background: linear-gradient(60deg, #0b2364, #050633);
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 47, 255, 0.4);
}

.card-icon3 {
  border-radius: 6px;
  background: linear-gradient(60deg, #0b2364, #050633);
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 47, 255, 0.4);
}

.card-icon4 {
  border-radius: 6px;
  background: linear-gradient(60deg, #0b2364, #050633);
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 47, 255, 0.4);
}



.card-icon1 > i, .card-icon2 > i, .card-icon3 > i, .card-icon4 > i  {
  font-size: 36px;
  line-height: 56px;
  width: 56px;
  height: 56px;
  text-align: center;
  color: #fff;
}

.card-category {
  color: #999999;
  font-size: 14px;
  margin-top: 10px;
}

.card-title {
  font-size: 1.5625rem;
  line-height: 1.4em;
  color: #3C4858;
  text-decoration: none;
  font-weight: 300;
}

.special {
  font-size: 80%;
  font-weight: 400;
}

.card-footer1 {
  display: flex;
  border-top: 1px solid #eee;
  /* margin-top: 20px; */
  /* padding: 0; */
  padding-top: 10px;
  margin: 20px 15px 10px;
  border-radius: 0;
  justify-content: space-between;
  align-items: center;
}

.status1 {
  display: inline-flex;
  color: #999999;
  font-size: 12px;
  line-height: 22px;
  box-sizing: border-box;
}

.status1 >.material-icons {
  /* font-size: 0; */
  bottom: 5px;
  /* font-size: 0; */
  position: relative;
  /* top: 4px; */
  font-size: 16px;
  margin-right: 3px;
  margin-left: 3px;
}




