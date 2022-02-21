<script
        src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>

<script src="IP_BDZ.js"></script>
<script src="dist/js/select2.min.js"></script>
<script src="dist/js/i18n/ru.js"></script>
<link href = "IP_BDZ.css" rel = "stylesheet" type = "text/css">

<script>
$(document).ready(function()
{
	$('.subjects').select2(
    {
		placeholder: "Выберите регион",
		maximumSelectionLength: 2,
		language: "ru"
	});
    $('.districts').select2(
    {
		placeholder: "Выберите район",
		maximumSelectionLength: 2,
		language: "ru"
	});
    $('.cities').select2(
    {
		placeholder: "Выберите город",
		maximumSelectionLength: 2,
		language: "ru"
	});
    $('.schools').select2(
    {
		placeholder: "Выберите школу",
		maximumSelectionLength: 2,
		language: "ru"
	});
    $('.houses').select2(
    {
		placeholder: "Выберите дом",
		maximumSelectionLength: 2,
		language: "ru"
	});
});
</script>

<form name="myform" action="#" method="post">
    <select id="subjects" name="subjects" class="subjects" onchange="changeSubject(this.value)">
        <option value="">Выберите регион</option>
        <?php
            $res = file_get_contents('data.json');

            $data = json_decode($res, true);
            for($i=0; $i<count($data['data_']['body']['level']['Subject']); $i++)
            {
        ?>
            <option value="<?php echo $i?>"><?php echo $data['data_']['body']['level']['Subject'][$i]['name'];?></option>
        <?php
            }
        ?>
    </select>

    <select id="districts" name="districts" class="districts" onchange="changeDistrict(this.value)">
        <option value="">Выберите район</option>
    </select>

    <select id="cities" name="cities" class="cities" onchange="changeCity(this.value)">
        <option value="">Выберите город</option>
    </select>

    <select id="schools" name="schools" class="schools" onchange="showSchool(this.value)">
        <option value="">Выберите школу</option>
    </select>

    <p>
    <div class="houses_div">
        <select id="houses" name="houses" class="houses" onchange="showHouse(this.value)">
            <option value="">Выберите дом</option>
        </select>
    </div>

    <a href="#openModal" class="open">Открыть</a>
    <div id="openModal" name="openModal" class="modalDialog">
        <div>
            <a href="#close" title="Закрыть" class="close"><img src="https://hunterae.com/wp-content/uploads/images/gaming-event-download-25443561-videohive-free-hunterae-com-7.jpg" height=30></a>
            <p><textarea id="school" name="school" class="school" rows="15"></textarea></p>
            <a onclick="saveData(school.value)" href="" class="save">Сохранить</a>
        </div>
    </div>


</form>

