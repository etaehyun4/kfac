from django.db import models
from django.contrib import admin
from django.contrib.auth.models import User

# Create your models here.
class Application(models.Model):
    doc = models.FileField(upload_to = "recruiting/app/", default = '')

class Guideline(models.Model):
    doc = models.FileField(upload_to = "recruiting/guide/", default = '')

class Question(models.Model):
    question = models.CharField(max_length = 100)
    writer = models.ForeignKey(User)
    date = models.DateField(auto_now = True)
    click = models.IntegerField(default = 0)
    answer = models.CharField(max_length = 500)

class AppAdmin(admin.ModelAdmin):
    list_display = ('doc',)

class GuideAdmin(admin.ModelAdmin):
    list_display = ('doc',)

class QuestionAdmin(admin.ModelAdmin):
    list_display = ('question', 'writer', 'date', 'answer')

admin.site.register(Application, AppAdmin)
admin.site.register(Guideline, GuideAdmin)
admin.site.register(Question, QuestionAdmin)
