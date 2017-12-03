from django.db.models import Model
from django.db.models import CharField
from django.db.models import TextField
from django.db.models import ImageField
from django.db.models import ForeignKey
from django.db.models import CASCADE
from website.cv.category import Category


class Item(Model):
    title = CharField(max_length=240, default="")
    description = TextField(default="")
    image = ImageField(blank=True)
    category = ForeignKey(Category, on_delete=CASCADE)
