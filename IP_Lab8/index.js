import express from 'express'
import path from 'path'
import {v4} from 'uuid'
const app = express()

let MAILS =
[
  {
    id: v4(),
    name: "mail_1",
    datatime: "07.05.2020 10:15:15",
    subject: "Первое",
    from: "andymailru@mail.ru",
    message: "Первая проверка"
  },
  {
    id: v4(),
    name: "mail_2",
    datatime: "07.05.2020 10:15:15",
    subject: "Второе",
    from: "andymailru@mail.ru",
    message: "Вторая проверка"
  },
  {
    id: v4(),
    name: "mail_3",
    datatime: "07.05.2020 10:20:15",
    subject: "Третье",
    from: "andymailru@mail.ru",
    message: "Третья проверка"
  },
]

app.use(express.json())

// GET
app.get('/api/mails', (req, res) =>
{
  setTimeout(() =>
  {
    res.status(200).json(MAILS)
  }, 1000)
})

// POST
app.post('/api/mails', (req, res) =>
{
  const mail = {...req.body, id: v4(), datatime: new Date()}
  MAILS.push(mail)
  res.status(201).json(mail)
})

// DELETE
app.delete('/api/mails/:id', (req, res) =>
{
  MAILS = MAILS.filter(c => c.id !== req.params.id)
  res.status(200).json({message: 'Контакт был удален'})
})

app.use(express.static(path.resolve('client')))

app.get('*', (req, res) =>
{
  res.sendFile(path.resolve('client', 'index.html'))
})

app.listen(3000, () => console.log('Server has been started on port 3000...'))