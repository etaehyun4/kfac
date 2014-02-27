# -*- coding: utf-8
from django.db import models
from django.contrib.auth.models import User
from django.contrib import admin

class UserProfile(models.Model):
    user = models.OneToOneField(User)
    question = models.CharField(max_length=100)
    answer = models.CharField(max_length=100)
    name = models.CharField(max_length=20)
    nick = models.CharField(max_length=20)
    birthday = models.DateField()
    phone = models.CharField(max_length=20)
