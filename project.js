const base = new URL(".", document.currentScript.src).href;

logo = `${base}images/Logo-CDO.png`;
home = `${base}index.html`;

defaultBreadcrumb = toElements(`
  <a href="https://eclipseide.org/">Home</a>
  <a href="https://eclipseide.org/projects/">Projects</a>
  <a href="${modelingBase}index.html">Modeling</a>
`);

defaultNav = toElements(`
<a class="fa-download" target="_out" href="https://download.eclipse.org/modeling/emf/emf/builds/"
  title="Downloads">
  Downloads<p>Update Sites</p>
</a>
<a class="fa-github" target="_out" href="https://github.com/eclipse-emf/"
  title="GitHub: Organization">
  GitHub<p>Organization</p>
</a>
`);

defaultAside = toElements(`
<a href="${base}index.html" class="separator"><i class='fa fa-cube'></i> Home</a>
<a href="${base}docs.html">Documentation</a>
<a target="_out" href="https://github.com/eclipse-emf/org.eclipse.emf/discussions">Ask a Question</a>
<a target="_out" href="https://github.com/eclipse-emf/org.eclipse.emf/issues">Report a Problem</a>
<a class="separator" href="${modelingBase}support.html"><i class="fa fa-address-book-o"></i> Support</a>
`);

additionalAside = `
<div class="col-md-6">
  <aside>
    <ul class="ul-left-nav">
      <div style="padding-top: 1.5em; padding-left: 1.5em;">
        <div class="sideitem">
          <h6>Buy the Book</h6>
          <p align="center">
            <a target="_out" href="http://www.informit.com/title/9780321331885">
              <img src="${base}images/EMF-2nd-Ed-Cover-Small.jpg" />
            </a>
          </p>
        </div>
      </div>
    </ul>
  </aside>
</div>`;
