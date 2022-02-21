function getXmlHttp()
{
    var xmlhttp;
    try
    {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e)
    {
        try
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (E)
        {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined')
    {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function changeSubject(id)
{
    var xmlhttp = getXmlHttp();
    xmlhttp.open('POST', 'DistrictsList.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("id=" + encodeURIComponent(id));

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4)
        {
            if(xmlhttp.status == 200)
            {
                var districts = JSON.parse(xmlhttp.responseText);
                var text = "<option value=''>Выберите район</option>";
                for (var i in districts)
                {
                    text += "<option value='" + i + "'>" + districts[i] + "</option>";
                }
                document.myform.districts.innerHTML = text;
            }
        }
    };
};

function changeDistrict(id)
{
    var xmlhttp = getXmlHttp();
    xmlhttp.open('POST', 'CitiesList.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("id=" + encodeURIComponent($('#subjects option:selected').val()) + "&id2=" + encodeURIComponent(id));

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4)
        {
            if(xmlhttp.status == 200)
            {
                var cities = JSON.parse(xmlhttp.responseText);
                var text = "<option value=''>Выберите город</option>";
                for (var i in cities)
                {
                    text += "<option value='" + i + "'>" + cities[i] + "</option>";
                }
                document.myform.cities.innerHTML = text;
            }
        }
    };
}

function changeCity(id)
{
    var a = $('#subjects option:selected').val();
    var b = $('#districts option:selected').val();
    var xmlhttp = getXmlHttp();
    var xmlhttp2 = getXmlHttp();
    xmlhttp.open('POST', 'SchoolsList.php', true);
    xmlhttp2.open('POST', 'HousesList.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("id=" + encodeURIComponent(a) + "&id2=" + encodeURIComponent(b) + "&id3=" + encodeURIComponent(id));
    xmlhttp2.send("id=" + encodeURIComponent(a) + "&id2=" + encodeURIComponent(b) + "&id3=" + encodeURIComponent(id));

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4)
        {
            if(xmlhttp.status == 200)
            {
                var schools = JSON.parse(xmlhttp.responseText);
                var text = "<option value=''>Выберите школу</option>";
                for (var i in schools)
                {
                    text += "<option value='" + i + "'>" + schools[i] + "</option>";
                }
                document.myform.schools.innerHTML = text;

            }
        }
    };

    xmlhttp2.onreadystatechange = function()
    {
        if (xmlhttp2.readyState == 4)
        {
            if(xmlhttp2.status == 200)
            {
                var houses = JSON.parse(xmlhttp2.responseText);
                var text = "<option value=''>Выберите дом</option>";
                for (var i in houses)
                {
                    text += "<option value='" + i + "'>" + houses[i] + "</option>";
                }
                document.myform.houses.innerHTML = text;

            }
        }
    };
}

function showSchool(id)
{
    var a = $('#subjects option:selected').val();
    var b = $('#districts option:selected').val();
    var c = $('#cities option:selected').val();
    var xmlhttp = getXmlHttp();
    xmlhttp.open('POST', 'ShowSchool.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("id=" + encodeURIComponent(a) + "&id2=" + encodeURIComponent(b) + "&id3=" + encodeURIComponent(c) + "&id4=" + encodeURIComponent(id));

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4)
        {
            if(xmlhttp.status == 200)
            {
                document.getElementById("school").innerHTML = xmlhttp.responseText;
            }
        }
    };
}

function showHouse(id)
{
    var a = $('#subjects option:selected').val();
    var b = $('#districts option:selected').val();
    var c = $('#cities option:selected').val();
    var xmlhttp = getXmlHttp();
    xmlhttp.open('POST', 'ShowHouse.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("id=" + encodeURIComponent(a) + "&id2=" + encodeURIComponent(b) + "&id3=" + encodeURIComponent(c) + "&id4=" + encodeURIComponent(id));

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4)
        {
            if(xmlhttp.status == 200)
            {
                document.getElementById("school").innerHTML = xmlhttp.responseText;
            }
        }
    };
}

function saveData(text)
{
    var xmlhttp = getXmlHttp();
    xmlhttp.open('POST', 'SaveData.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("text=" + encodeURIComponent(text));

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4)
        {
            if(xmlhttp.status == 200)
            {
                //document.getElementById("school").innerHTML = xmlhttp.responseText;
            }
        }
    };
}