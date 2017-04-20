<?php

require(ROOT . "model/BirthdayModel.php");

function index()
{
	render("birthday/index",
		array('birthday_months' =>
			array('january_birthdays' => getBirthdayMonth("1"),
				'february_birthdays' => getBirthdayMonth("2"),
				'march_birthdays' => getBirthdayMonth("3"),
				'april_birthdays' => getBirthdayMonth("4"),
				'may_birthdays' => getBirthdayMonth("5"),
				'june_birthdays' => getBirthdayMonth("6"),
				'july_birthdays' => getBirthdayMonth("7"),
				'august_birthdays' => getBirthdayMonth("8"),
				'september_birthdays' => getBirthdayMonth("9"),
				'october_birthdays' => getBirthdayMonth("10"),
				'november_birthdays' => getBirthdayMonth("11"),
				'december_birthdays' => getBirthdayMonth("12")
			)
		)
	);
}

function create()
{
	render("birthday/create");
}

function createSave()
{
	if (!createBirthday()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "birthday/index");
}

function edit($id)
{
	render("birthday/edit", array(
		'birthday' => getBirthday($id)
	));
}

function editSave()
{
	if (!editBirthday()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "birthday/index");
}

function delete($id)
{
	render("birthday/delete", array(
		'birthday' => getBirthday($id)
	));
}

function deleteSave($id)
{
	if (!deleteBirthday($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "birthday/index");
}