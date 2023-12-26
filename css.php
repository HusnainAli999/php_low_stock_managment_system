<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .top_h1 {
        width: 100%;
        padding: 20px;
        background: black;
        color: white;
    }

    .top_h1 a {
        float: right;
        font-size: 20px;
        background: darkred;
        color: white;
        text-decoration: none;
        padding: 10px;
        margin-left: 10px;
    }

    .product_main_handler_div {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 50px;
    }

    .product_inner_div {
        width: 500px;
        min-height: 150px;
        height: auto;
        background: white;
        box-shadow: 10px 10px 30px gray;
        padding: 20px;
        border-radius: 4px;
        margin-top: 20px;
    }

    .product_inner_div p {
        padding: 3px 5px 0px 0px;
    }

    .sale_sub_btn {
        background: green;
        width: 150px;
        padding: 10px;
        outline: none;
        border-radius: 3px;
        border: none;
        color: white;
        cursor: pointer;
        margin-top: 10px;
        margin-left: 65%;
    }

    .add_quantity_btn {
        background: darkred;
        color: white;
        padding: 10px;
        width: 150px;
        border: none;
        outline: none;
        cursor: pointer;
        margin-top: 10px;
        margin-left: 65%;
    }

    .add_quantity_real_form {
        width: 200px;
        height: 200px;
        background: white;
        color: black;
        box-shadow: 10px 10px 30px gray;
        padding: 20px;
    }

    .add_quantity_real_form input[type='number'] {
        width: 150px;
        padding: 6px;
        outline: none;
    }

    .add_quantity_real_form button {
        width: 150px;
        padding: 10px;
        background-color: green;
        color: white;
        cursor: pointer;
        border: none;
        outline: none;
        margin-top: 20px;
    }

    .main_quantity_add_div {
        position: absolute;
        left: 50%;
        top: -100%;
        transform: translateX(-50%);
        width: 200px;
        height: 200px;
        transition: all 0.4s;
    }

    .fa-bell {
        font-size: 20px;
        margin: 20px 20px 20px 90%;
    }

    .fa-bell:hover {
        color: red;
        cursor: pointer;
    }

    .show_low_stock_products_main_div {
        width: 300px;
        height: 500px;
        overflow-y: scroll;
        padding: 10px;
        border-radius: 4px;
        color: black;
        background: white;
        box-shadow: 10px 10px 30px gray;
        position: absolute;
        left: 50%;
        top: -100%;
        transform: translateX(-50%);
        transition: all 0.4s;
    }

    #low_stock_limits_form {
        width: 500px;
        min-height: 150px;
        height: auto;
        padding: 20px;
        background: white;
        color: black;
        border-radius: 5px;
        box-shadow: 10px 10px 30px gray;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        display: grid;
        grid-template-columns: repeat(2, 50%);
    }

    .alert_h1 {
        background: black;
        color: white;
        padding: 20px;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-radius: 4px;
    }

    #low_stock_limits_form label {
        display: inline-block;
        padding: 10px 5px 10px 0px;
    }

    #low_stock_limits_form input {
        width: 200px;
        padding: 10px;
        background: black;
        color: white;
        border: none;
        outline: none;
    }

    #low_stock_limits_form input[type="submit"] {
        width: 150px;
        background: green;
        color: white;
        padding: 10px;
        border: none;
        outline: none;
        cursor: pointer;
        margin-top: 35px;
    }

    .show_low_stock_products_main_div .s_f_p {
        text-align: center;
        background: black;
        color: white;
        padding: 10px;
    }

    .low_stock_product {
        background: red;
        color: white;
    }

    .delete_low_stock_row_a {
        background: red;
        color: white;
        text-decoration: none;
        padding: 5px;
        width: 200px;
    }

    .back_btn {
        background: darkred;
        color: white;
        padding: 10px;
        z-index: 9999;
        top: 20px;
        width: 150px;
        border: none;
        outline: none;
        cursor: pointer;
        border-radius: 4px;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        animation: back_animate 1s linear 4;
    }

    @keyframes back_animate {
        100% {
            background: red;
            transform: translateX(-50%) scale(1.1);
        }
    }

    .low_stock_inner_product_div {
        width: 100%;
        padding: 10px;
        background: black;
        color: white;
        margin-top: 10px;
    }

    a {
        text-decoration: none;
    }

    .low_stock_inner_product_div p {
        padding: 0px 0px 10px 0px;
    }

    .low_stock_pro_count_span {
        position: relative;
        left: -15px;
        top: -10px;
    }
</style>