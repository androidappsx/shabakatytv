import express from "express";

const app = express();
const PORT = process.env.PORT || 3000;

app.get("/:folder", async (req, res) => {
  const folder = req.params.folder;
  const idValue = req.query.id;

  if (!idValue) {
    return res.status(400).json({ error: "يرجى تحديد معرف صالح" });
  }

  const apiUrl = `https://raw.githubusercontent.com/androidappsx/shabakatytv/refs/heads/main/api/${folder}/${idValue}.json`;

  try {
    const response = await fetch(apiUrl);
    if (!response.ok) {
      throw new Error(`فشل في جلب البيانات من ${apiUrl}`);
    }

    const data = await response.json();
    res.json(data);
  } catch (error) {
    res.status(500).json({ error: "فشل في جلب البيانات" });
  }
});

app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
