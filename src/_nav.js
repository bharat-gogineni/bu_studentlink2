import { FaBook, FaCalculator, FaCalendar, FaGraduationCap, FaHamburger, FaHammer, FaHome, FaInfo, FaMoneyBill, FaSchool, FaUser } from "react-icons/fa"

const _nav = [
  {
    
    title: 'Home',
    itemId: '/home',
    icon: <FaHome />,
  },
  {
    
    title: 'Profile',
    itemId: '/profile',
    icon: <FaUser />,
  },
  {
    title: 'Academics',
    itemId: '/academics',
    icon: <FaBook />,
    items: [
      {
        
        title: 'University Class Schedule',
        itemId: '/academics/uniclassschedule',
        icon: <FaCalendar />
      },
      {
        
        title: 'University Course Description',
        itemId: '/academics/unicoursedescription',
        icon: <FaSchool />
      },
      {
        
        title: 'University Final Exam',
        itemId: '/academics/unifinalexam',
      },
      {
        
        title: 'Academic Summary',
        itemId: '/academics/academicsummary',
      },
      {
        
        title: 'Academic Advising',
        itemId: '/academics/academicadvising',
      },
      {
        
        title: 'Diploma and Graduate Information',
        itemId: '/academics/diplomagradinfo',
      },
      {
        
        title: 'Class and Grade Info',
        itemId: '/academics',
        icon: <FaGraduationCap />,
        items: [
          {
            
            title: 'GPA Estimator',
            itemId: '/academics/gpa_estimator',
            icon: <FaCalculator />
          },
          {
            
            title: 'Current Schedule',
            itemId: '/academics/current_schedule',
          },
          {
            
            title: 'Registration',
            itemId: '/academics/diplomagradinfo',
          },
          {
            
            title: 'Final Exam Schedule',
            itemId: '/academics/diplomagradinfo',
          },
          {
            
            title: 'Classes',
            itemId: '/academics/diplomagradinfo',
          },
          {
            
            title: 'Grades',
            itemId: '/academics/diplomagradinfo',
          },
          {
            
            title: 'External Credits & Test Scores',
            itemId: '/academics/diplomagradinfo',
          },
          {
            
            title: 'Transcript Preview and Ordering',
            itemId: '/academics/diplomagradinfo',
          },
        ],
      },
      {
        
        title: 'General Information',
        itemId: '/academics',
        icon: <FaInfo />,
        items: [
          {
            
            title: 'Academic Calendar',
            itemId: '/academics/diplomagradinfo',
          },
          {
            
            title: 'Registrars Office FAQs',
            itemId: '/academics/diplomagradinfo',
          },
          {
            
            title: 'Registrar Office Downloadable Forms',
            itemId: '/academics/diplomagradinfo',
          },
          {
            
            title: 'BU Libraries',
            itemId: '/academics/diplomagradinfo',
          },
          {
            
            title: 'Summer Term',
            itemId: '/academics/diplomagradinfo',
          },
          {
            
            title: 'Learn about Undergraduate Advising',
            itemId: '/academics/diplomagradinfo',
          },
        ],
      },
    ],
  },
  {
    
    title: 'Money Matters',
    itemId: '/money_matters',
    icon: <FaMoneyBill />,
    items: [
      {
        
        title: 'Stafford Loan Entrance Counseling',
        itemId: '/money_matters/uniclassschedule',
      },
      {
        
        title: 'Stafford On-line Promissory Note',
        itemId: '/money_matters/unicoursedescription',
      },
      {
        
        title: 'Student Account Inquiry',
        itemId: '/money_matters/unifinalexam',
      },
      {
        
        title: 'Library Account',
        itemId: '/money_matters/academicsummary',
      },
      {
        
        title: 'Student Health Insurance Plan (SHIP)',
        itemId: '/money_matters/academicadvising',
      },
      {
        
        title: 'Student Dental Plan',
        itemId: '/money_matters/academicadvising',
      },
      {
        
        title: 'Federal Financial Aid Credit Authorization Status',
        itemId: '/money_matters/academicadvising',
      },
      {
        
        title: 'Sports Pass',
        itemId: '/money_matters/academicadvising',
      },
      {
        
        title: "Student Account FAQ's",
        itemId: '/money_matters/academicadvising',
      },
      {
        
        title: 'Your Financial Aid',
        itemId: '/money_matters/academicadvising',
      },
      {
        
        title: 'General Financial Aid Information',
        itemId: '/money_matters/academicadvising',
      },
      {
        
        title: 'Loan Deferment Notifications',
        itemId: '/money_matters/academicadvising',
      },
      {
        
        title: 'Manage My Student Choice Refund Account',
        itemId: '/money_matters/academicadvising',
      },
      {
        
        title: '1098-T Electronic Consent',
        itemId: '/money_matters/academicadvising',
      },
    ],
  },
  {
    
    title: 'Work',
    itemId: '/academics',
    icon: <FaHammer />,
    items: [
      {
        
        title: 'Eligibility Requirements for Student Employees',
        itemId: '/work/uniclassschedule',
      },
      {
        
        title: 'Student Employment Office Website',
        itemId: '/work/unicoursedescription',
      },
      {
        
        title: 'Quick Jobs',
        itemId: '/work/unifinalexam',
      },
      {
        
        title: 'Part-time Jobs',
        itemId: '/work/academicsummary',
      },
      {
        
        title: 'Search - Quick and Part-time Jobs',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'Work-Study Award Information',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'Search - Quick and Part-time Jobs',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'Work-Study Job Listings',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'Student Job Evaluations',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'Center for Career Development',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'Career Advisory Network',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'Employee Time Entry',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'View Salary Statement',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'Direct Deposit Authorization',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'Form I-9 Compliance - Section 1',
        itemId: '/work/academicadvising',
      },
      {
        
        title: 'Update Tax Information',
        itemId: '/work/academicadvising',
      },
    ],
  },
  {
    
    title: 'Food and Shelter',
    itemId: '/academics',
    icon: <FaHamburger />,
    items: [
      {
        
        title: 'My Housing',
        itemId: '/food_shelter/uniclassschedule',
      },
      {
        
        title: 'Convenience Points Information',
        itemId: '/food_shelter/unicoursedescription',
      },
      {
        
        title: 'Convenience Points Purchase',
        itemId: '/food_shelter/unifinalexam',
      },
      {
        
        title: 'Dining Plan Options',
        itemId: '/food_shelter/academicsummary',
      },
      {
        
        title: 'Add or Change your Dining Plang',
        itemId: '/food_shelter/academicadvising',
      },
      {
        
        title: 'Current Balance - Meals & Points',
        itemId: '/food_shelter/academicadvising',
      },
      {
        
        title: 'Terrier Meal Share/Donate(Academic Year Only)',
        itemId: '/food_shelter/academicadvising',
      },
      {
        
        title: 'Terrier Card Center',
        itemId: '/food_shelter/academicadvising',
      },
      {
        
        title: 'Off Campus Housing',
        itemId: '/food_shelter/academicadvising',
      },
      {
        
        title: 'MicroFridge®, TV & Safe Rental',
        itemId: '/food_shelter/academicadvising',
      },
      {
        
        title: 'Laundry Web',
        itemId: '/food_shelter/academicadvising',
      },
    ],
  },
  {
    
    title: 'Basics',
    itemId: '/basics',
    icon: <FaInfo />,
    items: [
      {
        
        title: 'Getting Started',
        itemId: '/basics/uniclassschedule',
      },
      {
        
        title: 'What is on Student Link',
        itemId: '/basics/unicoursedescription',
      },
      {
        
        title: 'Student Central',
        itemId: '/basics/unifinalexam',
      },
      {
        
        title: 'BU Today ',
        itemId: '/basics/academicsummary',
      },
      {
        
        title: 'Campus Bookstore',
        itemId: '/basics/academicadvising',
      },
    ],
  },
]

export default _nav
