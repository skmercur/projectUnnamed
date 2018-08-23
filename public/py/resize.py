from PIL import Image
import sys
basewidth = 160
img = Image.open(sys.argv[1])
x = int(sys.argv[2])
y = int(sys.argv[3])
h = int(sys.argv[4])
w = int(sys.argv[5])




img = img.crop((x,y, w+x, h+y))

img.save(sys.argv[1])
