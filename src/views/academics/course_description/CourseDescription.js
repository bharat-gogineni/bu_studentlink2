import React from 'react'

const CourseDescription = () => {
  return (
    <div
      dangerouslySetInnerHTML={{
        __html:
          "<iframe src='https://www.bu.edu/phpbin/course-search/index.php' width='100%'  height='100%' />",
      }}
    />
  )
}

export default CourseDescription
