import React from 'react'
import professor1 from '../../../assets/professors/1.jpg'
import professor2 from '../../../assets/professors/2.png'
import professor3 from '../../../assets/professors/3.jpg'
import professor4 from '../../../assets/professors/4.jpg'
const tableExample = [
  {
    professor: { src: professor1 },
    course: {
      name: 'Andrew Sheehan',
      subject: 'Web Application Development',
      location: 'CAS 426',
    },
    usage: {
      value: 50,
      period: 'Jun 11, 2021 - Jul 10, 2021',
      color: 'success',
    },
    class_date: 'Thursday 6:00PM - 8:45PM',
  },
  {
    professor: { src: professor2, status: 'danger' },
    course: {
      name: 'Scott Arena',
      subject: 'Business Data Communications and Networks',
      location: 'STH 113',
    },
    usage: {
      value: 22,
      period: 'Jun 11, 2021 - Jul 10, 2021',
      color: 'info',
    },
    class_date: 'Mon 8:00AM - 10:45AM',
  },
  {
    professor: { src: professor3, status: 'warning' },
    course: {
      name: 'Andrew Gorlin',
      subject: 'Introduction to Probability and Statistics',
      location: 'HAR 316',
    },
    usage: {
      value: 74,
      period: 'Jun 11, 2021 - Jul 10, 2021',
      color: 'warning',
    },
    class_date: 'Tue 6:00PM - 8:45PM',
  },
  {
    professor: { src: professor4, status: 'secondary' },
    course: {
      name: 'Eugene Pinsky',
      subject: 'Information Structure with Python',
      location: 'KCB 104',
    },
    country: { name: 'France' },
    usage: {
      value: 98,
      period: 'Jun 11, 2021 - Jul 10, 2021',
      color: 'danger',
    },
    class_date: 'Wed 8:00AM - 10:45AM',
  },
]
const table2Example = [
  {
    professor: { src: professor1 },
    course: {
      name: 'Andrew Sheehan',
      subject: 'Server side Web Application Development',
      location: 'Online',
    },
    usage: {
      value: 50,
      period: 'Jun 11, 2021 - Jul 10, 2021',
      color: 'success',
    },
    class_date: 'Thursday 6:00PM - 8:45PM',
  },
  {
    professor: { src: professor2, status: 'danger' },
    course: {
      name: 'Scott Arena',
      subject: 'Business Data Communications and Networks',
      location: 'STH 113',
    },
    usage: {
      value: 22,
      period: 'Jun 11, 2021 - Jul 10, 2021',
      color: 'info',
    },
    class_date: 'Mon 8:00AM - 10:45AM',
  },
  {
    professor: { src: professor3, status: 'warning' },
    course: {
      name: 'Andrew Gorlin',
      subject: 'Introduction to Probability and Statistics',
      location: 'HAR 316',
    },
    usage: {
      value: 74,
      period: 'Jun 11, 2021 - Jul 10, 2021',
      color: 'warning',
    },
    class_date: 'Tue 6:00PM - 8:45PM',
  },
  {
    professor: { src: professor4, status: 'secondary' },
    course: {
      name: 'Eugene Pinsky',
      subject: 'Information Structure with Python',
      location: 'KCB 104',
    },
    country: { name: 'France' },
    usage: {
      value: 98,
      period: 'Jun 11, 2021 - Jul 10, 2021',
      color: 'danger',
    },
    class_date: 'Wed 8:00AM - 10:45AM',
  },
]
const ClassSchedule = () => {
  return (
    <>
    </>
  )
}

export default ClassSchedule
