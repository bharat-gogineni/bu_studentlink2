import React from 'react'

const UniCourseDescription = () => {
  return (
      <div
        dangerouslySetInnerHTML={{
          __html:
            "<iframe src='https://www.bu.edu/phpbin/course-search/index.php' width='100%' style='position: absolute; top: 0; right: 0; bottom: 0; left: 0;' height='100%' />",
        }}
      />
  )
}

export default UniCourseDescription
