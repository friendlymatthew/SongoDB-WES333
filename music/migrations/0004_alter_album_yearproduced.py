# Generated by Django 4.0.2 on 2022-03-09 21:51

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('music', '0003_rename_ablumtitle_album_albumtitle'),
    ]

    operations = [
        migrations.AlterField(
            model_name='album',
            name='yearProduced',
            field=models.IntegerField(),
        ),
    ]
