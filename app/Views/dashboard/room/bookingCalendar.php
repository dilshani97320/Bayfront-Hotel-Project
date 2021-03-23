
<style>


/* .container {
    display: flex;
    width: 100%;
    justify-content: center;
}

.row {
    display: block;
    padding: 20px;
}

.rowdetails {
    display: block;
} */

center {
    display: block;
    text-align: center;
}

h2 {
    font-weight: 500;
    margin-bottom: 14px;
    /* line-height: 1.2px; */
    /* margin-bottom: 5px; */
    /* color: black; */
}

tbody {
    width: 100%;
}
tr {
    width: 100%;
}

.buttonset {
    display: block;
    height: 35px;
}

a.btn_seek {
    /* display: block; */
    display: inline-block;
    width: 120px;
    margin-left: 10px;
    text-decoration: none;
    padding: 9px;
    background: #030c14;
    color: #fff;
    border-radius: 5px;
}

.tableContent {
    /* display: block; */
    width: 100%;
}

table {
    table-layout: fixed;
    border-collapse: collapse;
}

th.header {
    padding: 18px;
    font-size: 19px;
    background: #030c14;
    color: #fff;
    /* border: 1px solid #dee2e6; */
    border-top: 1px solid rgba(0, 0, 0, 0.06);
    border-bottom: 2px solid rgba(0, 0, 0, 0.06);
    
}

td {
    width: 125px;
    /* border: 1px solid #dee2e6; */
    border-top: 1px solid rgba(0, 0, 0, 0.06);
    border-bottom: 2px solid rgba(0, 0, 0, 0.06);
}

td > h4 {
    display: block;
    margin-left: 10px;
    margin-bottom: 10px;
    margin-top: 13px;
    font-size: 20px;
    line-height: 1px;
    padding: 3px;
}

.btn_seek_danger {
    display: inline-block;
    width: 67px;
    margin-left: 10px;
    margin-bottom: 10px;
    text-decoration: none;
    padding: 10px;
    background: #dc3545;
    color: #fff;
    border-radius: 5px;
    border: none;
    float: right;
    margin-right: 48px;
}

.btn_seek_view {
    display: inline-block;
    width: 108px;
    margin-left: 10px;
    margin-right: 10px;
    margin-bottom: 10px;
    text-decoration: none;
    padding: 10px;
    background: #dc3545;
    color: #fff;
    border-radius: 5px;
    border: none;
    float: right;
}

a.btn_seek_success {
    display: inline-block;
    width: 38px;
    margin-left: 10px;
    margin-bottom: 10px;
    text-decoration: none;
    padding: 10px;
    background: #28a745;
    color: #fff;
    border-radius: 5px;
    border: none;
    float: right;
    margin-right: 48px;
}

.today {
    background: #030c14;
    color: aliceblue;
    border-radius: 5px;
}
</style>


<?php echo $calendar; ?>
              
                       




