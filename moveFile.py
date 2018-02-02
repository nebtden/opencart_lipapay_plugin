#!/usr/bin/env python3.5
# -*- coding: utf-8 -*-
import os.path,zipfile
import shutil
import subprocess


base_dir = 'E:\Wnmp\html\opencart'
new_base_dir = r'E:\Wnmp\html\opencart\lipapay\upload'

def make_zip(source_dir, output_filename):
    zipf = zipfile.ZipFile(output_filename, 'w')
    pre_len = len(os.path.dirname(source_dir))
    for parent, dirnames, filenames in os.walk(source_dir):
        for filename in filenames:
            pathfile = os.path.join(parent, filename)
            arcname = pathfile[pre_len:].strip(os.path.sep)     #相对路径
            zipf.write(pathfile, arcname)
    zipf.close()


def copyOs(file):
    full_path = os.path.join(base_dir,file)
    is_dir = os.path.isdir(file)
    newfile = os.path.join(new_base_dir,file)
    new_dir  =os.path.dirname(newfile)
    print(new_dir)
    try:
        print('mkdir '+ '' + new_dir)
        out_bytes = subprocess.check_output('mkdir '+ '' + new_dir, shell=True)
    except:
        print('error')
    shutil.copyfile(full_path,newfile)


copyOs(r'admin\controller\extension\payment\lipapay.php')
copyOs(r'catalog\model\extension\payment\lipapay.php')
copyOs(r'catalog\controller\extension\payment\lipapay.php')
copyOs(r'catalog\view\theme\default\template\extension\payment\lipapay.twig')
copyOs(r'admin\controller\extension\payment\lipapay.php')
copyOs(r'admin\view\template\extension\payment\lipapay.twig')
copyOs(r'admin\language\en-gb\extension\payment\lipapay.php')
copyOs(r'admin\view\image\payment\lipapay.png')
copyOs(r'catalog\language\en-gb\extension\payment\lipapay.php')

make_zip(os.path.join(base_dir,r'lipapay\\'),os.path.join(base_dir,r'lipapay.ocmod.zip'))

# shutil.copy('E:\Wnmp\html\opencart\\admin\controller\extension\payment\lipapay.php',  'E:\Wnmp\html\opencart\lipapay\\admin\controller\extension\payment')
# shutil.copyfile('E:\Wnmp\html\opencart\catalog\model\extension\payment\lipapay.php', 'E:\Wnmp\html\opencart\lipapay\catalog\model\extension\payment\lipapay.php')
#
# shutil.copytree('E:\Wnmp\html\opencart\catalog\controller\extension\payment\lipapay.php','E:\Wnmp\html\opencart\lipapay\catalog\controller\extension\payment\lipapay.php')
# shutil.copytree('E:\Wnmp\html\opencart\catalog\view\theme\default\template\extension\payment\lipapay.twig','E:\Wnmp\html\opencart\lipapay\catalog\view\theme\default\template\extension\payment\lipapay.twig')
# shutil.copytree('E:\Wnmp\html\opencart\admin\controller\extension\payment\lipapay.php','E:\Wnmp\html\opencart\lipapay\admin\controller\extension\payment\lipapay.php')
# shutil.copytree('E:\Wnmp\html\opencart\admin\view\template\extension\payment\lipapay.php','E:\Wnmp\html\opencart\lipapay\admin\view\template\extension\payment\lipapay.php')
# shutil.copytree('E:\Wnmp\html\opencart\admin\language\en-gb\extension\payment\lipapay.php','E:\Wnmp\html\opencart\lipapay\admin\language\en-gb\extension\payment\lipapay.php')

