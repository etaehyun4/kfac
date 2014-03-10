from django.db import models
from django.contrib import admin

# Create your models here.

class Board(models.Model):
    name = models.CharField(max_length=50)
    order = models.IntegerField()
    def __str__(self):
        return self.name

class Article(models.Model):
    author = models.OneToOneField("account.UserProfile")
    title = models.CharField(max_length=50)
    board = models.ForeignKey(Board)
    contents = models.CharField(max_length=10000)
    notice = models.BooleanField()
    date = models.DateTimeField()
    recommend = models.IntegerField()
    read = models.IntegerField()
    ip = models.CharField(max_length=20)

class BoardAdmin(admin.ModelAdmin):
    list_display = ('name', 'order')

class ArticleAdmin(admin.ModelAdmin):
    list_display = ('author', 'title', 'board', 'contents', 'notice', 'date', 'recommend', 'read', 'ip')

admin.site.register(Board, BoardAdmin)
admin.site.register(Article, ArticleAdmin)
