import os, sys, shutil
from PIL import Image

size = 200, 200

for dirName, subdirList, fileList in os.walk(os.getcwd()):
	for fname in fileList:
		if (".jpg" in fname.lower() or ".png" in fname.lower()) and ", " in fname and "thumb" not in fname:
			img = Image.open(dirName + "/" + fname)
			imgNamePrefix = fname[0:fname.rfind(".")].replace(",", "").replace(" ", "_").replace("_full","").lower()
			img.save(dirName + "/" + imgNamePrefix + ".png", "PNG")
			img.thumbnail(size, Image.ANTIALIAS)
			img.save(dirName + "/" + imgNamePrefix + "_thumb.png", "PNG")
			os.remove(dirName + "/" + fname)
		elif (".jpg" in fname or ".png" in fname) and "thumb" not in fname:
			newDir = dirName[0:dirName.rfind("/")]
			# print(newDir)
			shutil.move(dirName + "/" + fname, newDir + "/archive/" + fname)