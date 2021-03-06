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
    birth = models.DateField(null=True)
    sex = models.CharField(max_length=5)
    phone = models.CharField(max_length=20)
    text = models.CharField(max_length=200)
    mailing = models.BooleanField(default=False)
    sms = models.BooleanField(default=False)
    info_open = models.BooleanField(default=False)
    def __str__(self):
        return str(self.user)

class UserAdmin(admin.ModelAdmin):
    list_display = ('user', 'name', 'sex')

admin.site.register(UserProfile, UserAdmin)
admin.site.register(User)
