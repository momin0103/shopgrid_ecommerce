<style>
    .div-one{
        height: 100px;
        width: 300px;
        background-color: green;
    }
</style>
<script src="{{asset('/')}}js.jquery-3.6.0.min.js"></script>


<div style="margin: 10px;">
    <button type="button" id="btn1">Create Div</button>
</div>
<div id="res">

</div>

<div style="margin: 10px;">
    <button type="button" id="btn">Click Me</button>
</div>

<div style="margin: 10px;">
    <h1 id="h1">This is content</h1>
    <input type="text" id="inputText">
</div>

<script>

    $('#btn1').click(function () {
        var div = document.createElement('div');
        div.classList.add('div-one');
        $('#res').append(div);
    });

    $('#inputText').keyup(function () {
        var data = $(this).val();
        $('#h1').text(data);
    });

    $('#btn').click(function () {
        alert('test');
    });

</script>
