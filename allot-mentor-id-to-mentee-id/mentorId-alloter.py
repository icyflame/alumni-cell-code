delim = ";"

filin = open("mentor-id-mentee-id-3-columns.csv", "r")

filout = open("mentee-id-mentor-id.csv", "w")

filout.write("MenteeId;MentorId\n")

for line in filin:

    line.strip()

##    linedataStr = line.split(delim)

    linedata = line.split(delim)

    try:

        linedataInt = [int(k) for k in linedata]

    except:

        print "error: ", k

##    linedata = []

##    for k in linedataStr:         
##
##        linedata.append(int(k))

    mentorId = linedataInt[0]        

    for i in range(1, 4, 1):

        if not linedataInt[i] == 0:

            filout.write(str(linedataInt[i]) + delim + str(mentorId) + "\n")

##    mentorId = linedata[0]
##
##    for i in range(1, 4, 1):
##
##        if not linedata[i] == '0':
##
##            filout.write(linedata[i] + delim + mentorId + '\n')

##            filout.write(str(linedata[i]) + delim + str(mentorId))

filout.close()

filin.close()
    
