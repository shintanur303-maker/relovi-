<?php
namespace App\Controllers;
class Page extends BaseController
{
public function about()
{
#echo "ini adalah halaman page";
echo view("about");
}

public function contact()
{
#echo "contact page";
echo view("contact");
}

public function faqs()
{
echo "Faqs page";
echo view("faqs");
}


public function login()
{
#echo "login page";
echo view("login");
}
}