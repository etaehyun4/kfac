from django.db import models
from django.contrib import admin

# Create your models here.


class Group(models.Model):
    name = models.CharField(max_length=50)
    text_left = models.CharField(max_length=100000)
    text_right = models.CharField(max_length=100000)

class GroupAdmin(admin.ModelAdmin):
    list_display = ('name', 'text_left', 'text_right')

admin.site.register(Group, GroupAdmin)
