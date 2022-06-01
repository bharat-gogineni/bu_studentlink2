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
import Grid from '@mui/material/Grid';
import Stack from '@mui/material/Stack';
import Box from '@mui/material/Box';
import Typography from '@mui/material/Typography';
import Container from '@mui/material/Container';

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
const ClassGradeInfo = () => {
  const [dateState, setDateState] = useState(new Date());
    useEffect(() => {
           setInterval(() => setDateState(new Date()), 1000);
    }, []);
  return (
    <>
      {/* Hero unit */}
      <Box
          sx={{
            bgcolor: 'background.paper',
            pt: 8,
            pb: 6,
          }}
        >
          <Container maxWidth="sm">
            <Typography
              component="h1"
              variant="h2"
              align="center"
              color="text.primary"
              gutterBottom
            >
              Album layout
            </Typography>
            <Typography variant="h5" align="center" color="text.secondary" paragraph>
              Something short and leading about the collection below—its contents,
              the creator, etc. Make it short and sweet, but not too short so folks
              don&apos;t simply skip over it entirely.
            </Typography>
            <Stack
              sx={{ pt: 4 }}
              direction="row"
              spacing={2}
              justifyContent="center"
            >
              <Button variant="contained">Main call to action</Button>
              <Button variant="outlined">Secondary action</Button>
            </Stack>
          </Container>
        </Box>
        <Container sx={{ py: 8 }} maxWidth="md">
          {/* End hero unit */}
          <Grid container spacing={4}>
            {cards.map((card) => (
              <Grid item key={card} xs={12} sm={6} md={4}>
                <Card
                  sx={{ height: '100%', display: 'flex', flexDirection: 'column' }}
                >
                  <CardMedia
                    component="img"
                    sx={{
                      // 16:9
                      pt: '56.25%',
                    }}
                    image="https://source.unsplash.com/random"
                    alt="random"
                  />
                  <CardContent sx={{ flexGrow: 1 }}>
                    <Typography gutterBottom variant="h5" component="h2">
                      Heading
                    </Typography>
                    <Typography>
                      This is a media card. You can use this section to describe the
                      content.
                    </Typography>
                  </CardContent>
                  <CardActions>
                    <Button size="small">View</Button>
                    <Button size="small">Edit</Button>
                  </CardActions>
                </Card>
              </Grid>
            ))}
          </Grid>
        </Container>
    </>
  )
}
export default ClassGradeInfo