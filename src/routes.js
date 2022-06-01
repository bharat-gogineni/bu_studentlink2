import React from 'react'
import GPAEstimator from './views/academics/gpa_estimator/GPAEstimator'
const Home = React.lazy(() => import('./views/home/Home'))
const Profile = React.lazy(() => import('./views/profile/Profile'))
//
const AcademicCalendar = React.lazy(() =>
  import('./views/academics/academic_calendar/AcademicCalendar'),
)
const BULibrary = React.lazy(() => import('./views/academics/bu_libraries/BULibrary'))
const Grades = React.lazy(() => import('./views/academics/grades/Grades'))
const CourseDescription = React.lazy(() =>
  import('./views/academics/course_description/CourseDescription'),
)
const DiplomaGradInfo = React.lazy(() =>
  import('./views/academics/diploma_grad_info/DiplomaGradInfo'),
)
const CurrentSchedule = React.lazy(() => import('./views/academics/class_schedule/ClassSchedule'))
const ExternalCreditTestScores = React.lazy(() =>
  import('./views/academics/external_credit_test_scores/ExternalCreditTestScores'),
)
const FinalExam = React.lazy(() => import('./views/academics/final_exam/FinalExam'))
const TranscriptPreviewAndOrdering = React.lazy(() =>
  import('./views/academics/registration/Registration'),
)
const UniClassSchedule = React.lazy(() =>
  import('./views/academics/uni_class_schedule/UniClassSchedule'),
)
const UniCourseDescription = React.lazy(() =>
  import('./views/academics/uni_course_description/UniCourseDescription'),
)
const AcademicAdvising = React.lazy(() =>
  import('./views/academics/academic_advising/AcademicAdvising'),
)
const AcademicSummary = React.lazy(() =>
  import('./views/academics/academic_summary/AcademicSummary'),
)
const UniFinalExam = React.lazy(() => import('./views/academics/uni_final_exam/UniFinalExam'))
const Cards = React.lazy(() => import('./views/academics/cards/Cards'))

const routes = [
  {
    path: '/',
    exact: true,
    name: 'Home',
  },
  {
    path: '/home',
    name: 'Home',
    element: Home,
  },
  {
    path: '/profile',
    name: 'Profile',
    element: Profile,
  },
  {
    path: '/academics',
    name: 'Academics',
    element: Cards,
    exact: true,
  },
  {
    path: '/academics/uniclassschedule',
    name: 'University Class Schedule',
    element: UniClassSchedule,
  },
  {
    path: '/academics/unicoursedescription',
    name: 'University Class Schedule',
    element: UniCourseDescription,
  },
  {
    path: '/academics/unifinalexam',
    name: 'University Final Exam',
    element: UniFinalExam,
  },
  {
    path: '/academics/academicadvising',
    name: 'Academic Advising',
    element: AcademicAdvising,
  },
  {
    path: '/academics/academicsummary',
    name: 'Academic Summary',
    element: AcademicSummary,
  },
  {
    path: '/academics/diplomagradinfo',
    name: 'Diploma and Graduation Information',
    element: DiplomaGradInfo,
  },
  {
    path: '/academics/class_schedule',
    name: 'Class Schedule',
    element: CourseDescription,
  },
  {
    path: '/academics/external_credit_test_scores',
    name: 'External Credit and Test Scores',
    element: ExternalCreditTestScores,
  },
  {
    path: '/academics/final_exam',
    name: 'Final Exam Schedule',
    element: FinalExam,
  },
  {
    path: '/academics/grades',
    name: 'Grades',
    element: Grades,
  },
  {
    path: '/academics/gpa_estimator',
    name: 'GPA Estimator',
    element: GPAEstimator,
  },
  {
    path: '/academics/current_schedule',
    name: 'Current Schedule',
    element: CurrentSchedule,
  },
  {
    path: '/academics/transcript_preview_ordering',
    name: 'Transcript Preview and Ordering',
    element: TranscriptPreviewAndOrdering,
  },
  {
    path: '/academics/academiccalendar',
    name: 'Academic Calendar',
    element: AcademicCalendar,
  },
  {
    path: '/academics/bulibrary',
    name: 'BU Library',
    element: BULibrary,
  },
  {
    path: '/money_matters',
    name: 'Money Matters',
    element: Cards,
    exact: true,
  },
  {
    path: '/money_matters/stafford_loan_entrance_counseling',
    name: 'Stafford Loan Entrance Counseling',
    element: UniClassSchedule,
  },
  {
    path: '/money_matters/unicoursedescription',
    name: 'Stafford On-line Promissory Note',
    element: UniCourseDescription,
  },
  {
    path: '/money_matters/unifinalexam',
    name: 'Library Account',
    element: UniFinalExam,
  },
  {
    path: '/money_matters/academicadvising',
    name: 'Student Health Insurance Plan (SHIP)',
    element: AcademicAdvising,
  },
  {
    path: '/money_matters/money_mattersummary',
    name: 'Student Dental Plan',
    element: AcademicSummary,
  },
  {
    path: '/money_matters/diplomagradinfo',
    name: 'Federal Financial Aid Credit Authorization Status',
    element: DiplomaGradInfo,
  },
  {
    path: '/money_matters/class_schedule',
    name: 'Sports Pass',
    element: CourseDescription,
  },
  {
    path: '/money_matters/external_credit_test_scores',
    name: 'Student Account FAQ',
    element: ExternalCreditTestScores,
  },
  {
    path: '/money_matters/final_exam',
    name: 'Your Financial Aid',
    element: FinalExam,
  },
  {
    path: '/money_matters/grades',
    name: 'General Financial Aid Information',
    element: Grades,
  },
  {
    path: '/money_matters/transcript_preview_ordering',
    name: 'Loan Deferment Notifications',
    element: TranscriptPreviewAndOrdering,
  },
  {
    path: '/money_matters/transcript_preview_ordering',
    name: 'Manage My Student Choice Refund Account',
    element: TranscriptPreviewAndOrdering,
  },
  {
    path: '/money_matters/transcript_preview_ordering',
    name: '1098-T Electronic Consent',
    element: TranscriptPreviewAndOrdering,
  },
]

export default routes
