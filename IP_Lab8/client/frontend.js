import Vue from '/browser.js'

Vue.component('loader',
{
    template: `
      <div style="display: flex;justify-content: center;align-items: center">
        <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>`
})
  
new Vue(
{
  el: '#app',
  data()
  {
    return {
      loading: false,
      form:
      {
        name: '',
        subject: '',
        from: '',
        message: ''
      },
      mails: []
    }
  },
  computed:
  {
    canCreate()
    {
      return this.form.message.trim() && this.form.from.trim() && this.form.subject.trim() && this.form.name.trim()
    }
  },
  methods:
  {
    async createMail()
    {
      const {...mail} = this.form
      const newMail = await request('/api/mails', 'POST', mail)
      this.mails.push(newMail)
      this.form.name = this.form.datatime = this.form.subject = this.form.from = this.form.message = ''
    },
    async removeMail(id)
    {
      await request(`/api/mails/${id}`, 'DELETE')
      this.mails = this.mails.filter(c => c.id !== id)
    }
  },
  async mounted()
  {
    this.loading = true
    this.mails = await request('/api/mails')
    this.loading = false
  }
})

async function request(url, method = 'GET', data = null)
{
  try
  {
    const headers = {}
    let body
    if (data)
    {
      headers['Content-Type'] = 'application/json'
      body = JSON.stringify(data)
      //saveAllDate(JSON.stringify(data))
    }
    const response = await fetch(url,
    {
      method,
      headers,
      body
    })
    return await response.json()
  }
  catch (e)
  {
    console.warn('Error:', e.message)
  }
}

async function saveAllDate(data) {
    
  fs.writeFile('jsonFile.txt', data, function(error){
      if(error) sendErr(e, `Error BD access`); // если возникла ошибка
  });

  return true;
}