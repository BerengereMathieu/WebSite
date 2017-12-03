from django.db.models import Model
from django.db.models import CharField
from django.db.models import TextField
from django.db.models import ImageField
from django.db.models import ManyToManyField
from cv.models.tag import Tag


class Item(Model):
    title = CharField(max_length=240, default="")
    description = TextField(default="")
    image = ImageField(blank=True)
    tags = ManyToManyField(Tag)
