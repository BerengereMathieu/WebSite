# Generated by Django 2.0 on 2017-12-03 15:04

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('cv', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='item',
            name='tags',
        ),
        migrations.DeleteModel(
            name='Category',
        ),
        migrations.DeleteModel(
            name='Item',
        ),
    ]