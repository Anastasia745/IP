let button = document.querySelector('button');

/*function proverkaText(input)
{ 
    var value = input.value; 
    var rep = /[-\.;":'a-zA-Z]/; 
    if (rep.test(value))
    {
        value = value.replace(rep, '');
        input.value = value;
    }
}*/

function proverkaRadio()
{
    var rd3 = document.getElementById("rad_position3");
    var ch1 = document.getElementById("check_position1");
    var ch2 = document.getElementById("check_position2");
    var ch3 = document.getElementById("check_position3");

    if(rd3.checked == true)
    {
        alert('done!');
        localStorage.setItem("line", document.getElementById("input_line").value);
        localStorage.setItem("radio", rd3.id);
        if(ch2.checked == true)
            localStorage.setItem("checkbox", ch1.id + ', ' + ch2.id + ', ' + ch3.id);
        else
            localStorage.setItem("checkbox", ch1.id + ', ' + ch3.id);
    }
    else
        alert('Radio: select the 3rd position!');
}

function line(input)
{
    var l = input.value;
    l = localStorage.getItem("line");
    input.value = l;
    return input.value;
}