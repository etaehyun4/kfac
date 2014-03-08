from django.db import models
from django.contrib.auth.models import User

# Create your models here.

class Board(models.Model):
    name = models.CharField(max_length=50)

class Article(models.Model):
    author = models.OneToOneField(User)
    title = models.CharField(max_length=50)
    board = models.ForeignKey(Board)
    contents = models.CharField(max_length=1000000)
    notice = models.BooleanField()
    date = models.DateTimeField()
    recommend = models.IntegerField()
    read = models.IntegerField()
    ip = models.CharField(max_length=20)
