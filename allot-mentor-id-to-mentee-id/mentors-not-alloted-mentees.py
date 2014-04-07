delim = ";"

filin = open("mentee-id-mentor-id.csv", "r")

filout = open("mentors-not-allotted-mentees.csv", "w")

allMentors = range(1, 392, 1)

filout.write(filin.read())

filin.seek(0)

mentees_allotted_mentors = []

# Build a list with all the mentors allotted mentees.

for i in filin:

    while i[-1] == '\n' or i[-1] == '\r':

        i = i[:-1]

##    print i

    try:

        mentorId = int(i.split(delim)[1]) # if it is not what we expect,
                                          # we ditch it!

    except:

        print "error"
        continue

    mentees_allotted_mentors.append(mentorId)

for i in allMentors:

    if not i in mentees_allotted_mentors:

        filout.write("0" + delim + str(i) + "\n")

filout.close()

filin.close()
