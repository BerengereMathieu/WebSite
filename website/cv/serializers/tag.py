from rest_framework.serializers import ModelSerializer
from cv.models.tag import Tag


class TagSerializer(ModelSerializer):
    """
    Tag serialier
    """

    class Meta:
        model = Tag
        fields = ('name',)
