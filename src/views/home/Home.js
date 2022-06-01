import React, { useState, useEffect }  from 'react'
import professor1 from '../../assets/professors/1.jpg'
import professor2 from '../../assets/professors/2.png'
import professor3 from '../../assets/professors/3.jpg'
import professor4 from '../../assets/professors/4.jpg'
import Button from '@mui/material/Button';
import Card from '@mui/material/Card';
import CardActions from '@mui/material/CardActions';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import { CardHeader } from '@mui/material'
import Box from '@mui/material/Box';
import { Grid } from '@mui/material'
import Typography from '@mui/material/Typography';
const images = [
  {
    label: 'San Francisco – Oakland Bay Bridge, United States',
    imgPath:
      'https://images.unsplash.com/photo-1537944434965-cf4679d1a598?auto=format&fit=crop&w=400&h=250&q=60',
  },
  {
    label: 'Bird',
    imgPath:
      'https://images.unsplash.com/photo-1538032746644-0212e812a9e7?auto=format&fit=crop&w=400&h=250&q=60',
  },
  {
    label: 'Bali, Indonesia',
    imgPath:
      'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=400&h=250&q=80',
  },
  {
    label: 'Goč, Serbia',
    imgPath:
      'https://images.unsplash.com/photo-1512341689857-198e7e2f3ca8?auto=format&fit=crop&w=400&h=250&q=60',
  },
];
const cards = [1, 2, 3, 4, 5, 6, 7, 8, 9];
const tableExample = [
  {
    professor: { src: professor1 },
    course: {
      name: 'Andrew Sheehan',
      subject: "Web Application Development",
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
      subject: "Business Data Communications and Networks",
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
    course: { name: 'Andrew Gorlin', subject: "Introduction to Probability and Statistics", location: 'HAR 316' },
    usage: {
      value: 74,
      period: 'Jun 11, 2021 - Jul 10, 2021',
      color: 'warning',
    },
    class_date: 'Tue 6:00PM - 8:45PM',
  },
  {
    professor: { src: professor4, status: 'secondary' },
    course: { name: 'Eugene Pinsky', subject: "Information Structure with Python", location: 'KCB 104' },
    country: { name: 'France' },
    usage: {
      value: 98,
      period: 'Jun 11, 2021 - Jul 10, 2021',
      color: 'danger',
    },
    class_date: 'Wed 8:00AM - 10:45AM',
  },
]
const Home = () => {
  const [dateState, setDateState] = useState(new Date());
    useEffect(() => {
           setInterval(() => setDateState(new Date()), 1000);
    }, []);
  return (
    <Grid container spacing={2}>
     <Grid item xs={6} md={8}>
     <Grid
          container
          spacing={2}
          direction="row"
          justify="flex-start"
          alignItems="flex-start"
        >
          {tableExample.map((elem) => (
            <Grid item xs={3} key={tableExample.indexOf(elem)}>
              <Card>
              <CardMedia
                component="img"
                height="140"
                image={elem.professor.src}
              />
                <CardHeader
                  course={`Subject : ${elem.course.subject}`}
                  subheader={`Lcocation : ${elem.course.location}`}
                />
                <CardContent>
                  Time : {elem.course.class_date}
                  <Typography variant="h5" gutterBottom>
                    {elem.course.name}
                  </Typography>
                </CardContent>
              </Card>
            </Grid>
          ))}
        </Grid>
  </Grid>
  <Grid item xs={6} md={4}>
  <Card sx={{ maxWidth: 345 }}>
      <CardContent>
         <br />
              <a href="https://www.bu.edu/link/bin/uiscgi_studentlink.pl/1639086306?ModuleName=email.pl">Check Your Email</a>
              <br />
              <a href="https://www.bu.edu/link/bin/uiscgi_studentlink.pl/1639086306?ModuleName=final_exam.pl">Final Exam Schedule</a>
              <br />
              <a href="https://www.bu.edu/link/bin/uiscgi_studentlink.pl/1639086306?ModuleName=google_map/google_map.pl">Duo for Google Apps</a>
              <br />
              <a href="https://www.bu.edu/link/bin/uiscgi_studentlink.pl/1639086306?ModuleName=gpasum.pl">GPA Estimator</a>
              <br />
              <a href="https://www.bu.edu/link/bin/uiscgi_studentlink.pl/1639086306?ModuleName=workstu_intro.pl">Work Study Jobs</a>
              <br />
      </CardContent>
    </Card>
  </Grid>
    </Grid>
  )
}
export default Home