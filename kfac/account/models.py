# -*- coding: utf-8
from django.db import models
from django.contrib.auth.models import User
from django.contrib import admin

class UserProfile(models.Model):
    user = models.OneToOneField(User)
    question = models.IntegerField(default=0)
    answer = models.CharField(max_length=100)
    name = models.CharField(max_length=20)
    nick = models.CharField(max_length=20)
    birth = models.DateField()
    sex = models.CharField(max_length=5)
    phone = models.CharField(max_length=20)
    text = models.CharField(max_length=200)
    mailing = models.BooleanField()
    sms = models.BooleanField()
    info_open = models.BooleanField()
