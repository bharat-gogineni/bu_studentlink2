import React from 'react'

const Grades = () => {
  return (
    <div
      dangerouslySetInnerHTML={{
        __html:
          "<iframe src='https://www.bu.edu/link/bin/uiscgi_studentlink.pl/1638476691?ModuleName=univschs.pl' width='100%'  height='100%' />",
      }}
    />
  )
}

export default Grades
