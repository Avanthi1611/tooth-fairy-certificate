# Automated Tooth Fairy Certificate Generator

A high-fidelity web application built with **PHP** and the **GD Graphics Library**. This project demonstrates the ability to manipulate image layers, scale assets dynamically, and handle complex text-overlay positioning using coordinate-based logic.

---

## Technical Highlights
- **Dynamic Image Scaling:** Uses `imagecopyresampled` to normalize various template sizes into a standard A4 (1123x794 px) high-resolution output.
- **Precision Text Overlay:** Implements `imagettfbbox` to calculate exact pixel dimensions of text strings for perfect horizontal centering.
- **Inclusive Logic:** A backend pronoun-mapping system that allows users to select He/She/They preferences, dynamically updating the certificate's syntax.
- **Font Rendering:** Integration of external Google Fonts via TrueType (.ttf) processing for professional typography.

##  Tech Stack
- **Backend:** PHP 8.x (GD Extension)
- **Frontend:** HTML5, CSS3 (Bootstrap 5.3)
- **Live Demo:** [Launch Certificate Generator](https://igbpk.ciroue.com)
- **Deployment:** [PHPSandbox](https://phpsandbox.io/e/x/igbpk?layout=EditorPreview)

## Project Structure
```text
├── index.php                 # Core Logic, Image Processing & UI
├── Certificate_tooth.jpg     # Optimized Image Template
├── CaveatBrush-Regular.ttf   # Google Font Asset
├── Raleway-VariableFont_wght.ttf # Google Font Asset
└── README.md                 # Project Documentation
```
## How It Works

* **Input:** The user provides a name, pronoun preference, and date (defaults to System Date).
* **Processing:** The PHP script initializes a GD resource, loads the template, and performs a high-quality resample to target dimensions.
* **Rendering:** The script calculates the "Bounding Box" for the specific font size to ensure center-alignment.
* **Output:** The server generates a buffer and triggers an automatic browser download of a unique `.jpg` file.
---
##  Credits & Attributions
This project utilizes third-party design assets to demonstrate real-world integration of graphic templates with server-side logic:

* **Visual Template:** The base certificate design is a modified version of the [Blue and Yellow Playful Tooth Fairy Certificate](https://www.canva.com/templates/EAE9dtzPv_o-blue-yellow-playful-tooth-fairy-certificate/) by @firstyline in Canva.
* **Typography:** All fonts used are licensed under the [Open Font License (OFL)](https://scripts.sil.org/OFL) and were sourced via Google Fonts.
---
## Developer Profile

**Avanthika DG** *Integrated M.Tech in Software Engineering* **Vellore Institute of Technology (VIT), Chennai** 

 **Email:** [avanthika.career@gmail.com](mailto:avanthika.career@gmail.com)  
 **GitHub:** [Avanthi1611](https://github.com/Avanthi1611)
---
> Developed as part of a Web Application Design project focusing on **Graphics and Server-side Scripting**.


