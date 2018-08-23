from PIL import Image
import sys
basewidth = 300
img = Image.open(sys.argv[1])
x = sys.argv[2]
y = sys.argv[3]
h = sys.argv[4]
w = sys.argv[5]

wpercent = (basewidth/float(img.size[0]))
hsize = int((float(img.size[1])*float(wpercent)))
img = img.resize((basewidth,hsize), Image.ANTIALIAS)


img = img.crop((x,y, w, h))
img.save(sys.argv[1])
