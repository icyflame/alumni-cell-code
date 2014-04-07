filin = open("allotedMentees.csv", "r")

data = []

for line in filin:

    line = line[:-1]
    data.append(int(line))

##
##data = filin.readlines()

filin.close()

##print data
##
##print type(data[0])


##for i in data:
##
##    dataInt.append(int(i))
##
##print dataInt
##print type(dataInt[0])

dataAll = range(1, 844, 1)

notalloted = []

##dataStrAll = []
##
##notalloted = []
##
##for i in dataAll:
##
##    dataStrAll.append(str(i))
##
##for i in dataStrAll:
##
##    try:
##
##        data.find(i)
##
##    except:
##
##        notalloted.append(i)
##
##len(notalloted)

for i in dataAll:

    if not i in data:

        notalloted.append(i)

        
