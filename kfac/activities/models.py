from django.db import models
from django.contrib import admin

# Create your models here.

class Activity(models.Model):
    name = models.CharField(max_length=50)
    order = models.IntegerField()
    img = models.ImageField(upload_to='image/activities/contents', null=True)

class ActivityAdmin(admin.ModelAdmin):
    list_display = ('name', 'order', 'img')

admin.site.register(Activity, ActivityAdmin)
