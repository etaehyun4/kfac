from django.db import models
from django.contrib import admin
from django.db.models.signals import post_delete
from django.core.files.storage import default_storage

# Create your models here.

class Board(models.Model):
    name = models.CharField(max_length=50)
    order = models.IntegerField(primary_key=True)
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

class ArticleFile(models.Model):
    upload_file = models.FileField(upload_to='files/only')
    article = models.ForeignKey(Article, related_name='files')
    name = models.CharField(max_length=100)

class Comment(models.Model):
    writer = models.ForeignKey("account.UserProfile")
    text = models.CharField(max_length=300)
    article = models.ForeignKey(Article, related_name='comments')
    created = models.DateTimeField(auto_now_add=True)

def delete_filefield(sender, **kwargs):
    article_file = kwargs.get('instance')
    default_storage.delete(article_file.upload_file.path)
post_delete.connect(delete_filefield, ArticleFile)

class BoardAdmin(admin.ModelAdmin):
    list_display = ('name', 'order')

class ArticleAdmin(admin.ModelAdmin):
    list_display = ('author', 'title', 'board', 'contents', 'notice', 'read')

admin.site.register(Board, BoardAdmin)
admin.site.register(Article, ArticleAdmin)
