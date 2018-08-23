from PIL import Image
import sys
basewidth = 300
img = Image.open(sys.argv[1])


wpercent = (basewidth/float(img.size[0]))
hsize = int((float(img.size[1])*float(wpercent)))
img = img.resize((basewidth,hsize), Image.ANTIALIAS)

height,width = img.size
left = (width/2)-(width/4)
top = (height/2)-(height/4)
bottom = (height/2)+(height/4)
right = (width/2)+(width/4)

img = img.crop((left, top, right, bottom))
img.save(sys.argv[1])
