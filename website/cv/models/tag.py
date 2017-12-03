from django.db.models import Model
from django.db.models import CharField


class Tag(Model):
    """
    Tags for CV items
    """
    name = CharField(max_length=240, default="")

    def __str__(self):
        return self.name
