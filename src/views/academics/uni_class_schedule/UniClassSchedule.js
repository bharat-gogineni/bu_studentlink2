import React, { useState, useEffect } from "react";
import { FormControl,InputLabel,Select,MenuItem,Grid,Card,CardHeader,CardContent,Typography } from '@mui/material'
import { makeStyles } from "@mui/styles";

const UniClassSchedule = () => {
  const [department, setDepartment] = React.useState('');
  const [data, setData] = React.useState([]);
  const [isLoading, setIsLoading] = useState(true);


  const handleChange = (event) => {
    setDepartment(event.target.value);
  };
  const useStyles = makeStyles((theme) => ({
    root: {
      flexGrow: 1
    }
  }));
  const classes = useStyles();
  useEffect(() => {
    fetch(`/json/2021-fall.json`,
      {
        method: "GET"
      }
    )
      .then(res => res.json())
      .then(response => {
        console.log(response)
        setData(response)
        setIsLoading(false);
      })
      .catch(error => console.log(error));
  });
  return (
    <div>
    <FormControl fullWidth>
  <InputLabel id="demo-simple-select-label">Department</InputLabel>
  <Select
    labelId="demo-simple-select-label"
    id="demo-simple-select"
    value={department}
    label="Department"
    onChange={handleChange}
  >
    <MenuItem value={10}>Ten</MenuItem>
    <MenuItem value={20}>Twenty</MenuItem>
    <MenuItem value={30}>Thirty</MenuItem>
  </Select>
</FormControl>
<div className={classes.root}>
        <Grid
          container
          spacing={2}
          direction="row"
          justify="flex-start"
          alignItems="flex-start"
        >
          {data.map((elem) => (
            <Grid item xs={3} key={data.indexOf(elem)}>
              <Card>
                <CardHeader
                  title={`Subject : ${elem.Name}`}
                  subheader={`Type : ${elem.Type}`}
                />
                <CardContent>
                  <Typography variant="h5" gutterBottom>
                    {elem.Description}
                  </Typography>
                </CardContent>
              </Card>
            </Grid>
          ))}
        </Grid>
    </div>
    </div>
  )
}

export default UniClassSchedule
