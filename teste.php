<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        .counter {
            display: flex;
            border: 1px solid gray;
            width: fit-content;
            margin: 50px auto;
        }

        .counter button {
            border: none;
            background-color: white;
            padding: 3.5px
        }

        .number {
            padding: 0px 5px
        }
    </style>
</head>
<body>
    <div class="counter">
        <button onclick="reduce()">-</button>
        <div class="number">0</div>
        <button onclick="active()">+</button>
    </div>
</body>
<script>
    function reduce() {
        let elementValue = document.querySelector(".number");
        let valor = elementValue.innerHTML; 

        elementValue.innerHTML = valor > 0 ? parseInt(valor) - 1 : 0;
    }

    function active() {
        let elementValue = document.querySelector(".number");
        let valor = elementValue.innerHTML;

        elementValue.innerHTML = parseInt(valor) + 1;
    }
</script>
</html>