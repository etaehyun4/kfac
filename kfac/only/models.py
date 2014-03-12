from django.db import models
from django.contrib import admin

# Create your models here.

class Board(models.Model):
    name = models.CharField(max_length=50)
    order = models.IntegerField()
    def __str__(self):
        return self.name

class Article(models.Model):
    author = models.ForeignKey("account.UserProfile")
    title = models.CharField(max_length=50)
    board = models.ForeignKey(Board)
    contents = models.CharField(max_length=10000)
    notice = models.BooleanField()
    created = models.DateTimeField(auto_now_add=True)
    read = models.IntegerField(default=0)
    recommend = models.IntegerField(default=0)

class ArticleFile(models.Model):
    upload_file = models.FileField(upload_to='files/only')
    article = models.ForeignKey(Article, related_name='files')

class BoardAdmin(admin.ModelAdmin):
    list_display = ('name', 'order')

class ArticleAdmin(admin.ModelAdmin):
    list_display = ('author', 'title', 'board', 'contents', 'notice', 'recommend', 'read')

admin.site.register(Board, BoardAdmin)
admin.site.register(Article, ArticleAdmin)
