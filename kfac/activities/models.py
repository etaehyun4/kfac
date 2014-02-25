from django.db import models

# Create your models here.

class Activity(models.Model):
    name = models.CharField(max_length=50)
    order = models.IntegerField()
    filename = models.CharField(max_length=50)
